<?php
include "../includes/auth.php";
include "../includes/config.php";

$id = $_GET["id"] ?? null;

if (!$id) {
    header("Location: index.php");
    exit;
}

$isAdmin = $_SESSION["role"] === "admin";

/*
|--------------------------------------------------------------------------
| RÉCUPÉRER L’EMPRUNT
|--------------------------------------------------------------------------
*/

if ($isAdmin) {

    // ADMIN → peut retourner TOUS les emprunts
    $stmt = $pdo->prepare("
        SELECT livre_id
        FROM emprunt
        WHERE id = ?
        AND dateRetour IS NULL
    ");
    $stmt->execute([$id]);

} else {

    // USER → seulement SES emprunts
    $stmt = $pdo->prepare("
        SELECT livre_id
        FROM emprunt
        WHERE id = ?
          AND emprunteur_type = 'user'
          AND user_id = ?
          AND dateRetour IS NULL
    ");
    $stmt->execute([$id, $_SESSION["user_id"]]);
}

$emprunt = $stmt->fetch();

if (!$emprunt) {
    header("Location: index.php");
    exit;
}

/*
|--------------------------------------------------------------------------
| 1️⃣ MARQUER LE RETOUR
|--------------------------------------------------------------------------
*/
$pdo->prepare("
    UPDATE emprunt
    SET dateRetour = CURDATE()
    WHERE id = ?
")->execute([$id]);

/*
|--------------------------------------------------------------------------
| 2️⃣ RENDRE LE LIVRE DISPONIBLE
|--------------------------------------------------------------------------
*/
$pdo->prepare("
    UPDATE livre
    SET disponible = 1
    WHERE id = ?
")->execute([$emprunt["livre_id"]]);

header("Location: index.php");
exit;
