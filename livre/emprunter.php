<?php
include "../includes/auth.php";
include "../includes/config.php";

/*
|--------------------------------------------------------------------------
| 0️⃣ RÉCUPÉRER LE LIVRE
|--------------------------------------------------------------------------
*/
$idLivre = $_GET["id"] ?? $_POST["livre_id"] ?? null;

if (!$idLivre) {
    header("Location: index.php");
    exit;
}

/*
|--------------------------------------------------------------------------
| 1️⃣ VÉRIFIER DISPONIBILITÉ
|--------------------------------------------------------------------------
*/
$stmt = $pdo->prepare("
    SELECT id, disponible 
    FROM livre 
    WHERE id = ?
");
$stmt->execute([$idLivre]);
$livre = $stmt->fetch();

if (!$livre || !$livre["disponible"]) {
    header("Location: index.php?error=indispo");
    exit;
}

/*
|--------------------------------------------------------------------------
| 2️⃣ DÉTERMINER L’EMPRUNTEUR
|--------------------------------------------------------------------------
*/
$role = $_SESSION["role"];

$user_id = null;
$etudiant_id = null;
$admin_id = null;
$emprunteur_type = null;

if ($role === "user") {

    $user_id = $_SESSION["user_id"];
    $emprunteur_type = "user";

} elseif ($role === "admin") {

    $admin_id = $_SESSION["user_id"];

    if (!empty($_POST["etudiant_id"])) {
        $etudiant_id = $_POST["etudiant_id"];
        $emprunteur_type = "etudiant";
    } else {
        $user_id = $_SESSION["user_id"];
        $emprunteur_type = "user";
    }

} else {
    header("Location: index.php");
    exit;
}

/*
|--------------------------------------------------------------------------
| 3️⃣ TRANSACTION
|--------------------------------------------------------------------------
*/
$pdo->beginTransaction();

try {

    // ➕ Ajouter l’emprunt
    $pdo->prepare("
        INSERT INTO emprunt (
            livre_id,
            emprunteur_type,
            user_id,
            etudiant_id,
            admin_id,
            dateEmprunt
        )
        VALUES (?, ?, ?, ?, ?, CURDATE())
    ")->execute([
        $idLivre,
        $emprunteur_type,
        $user_id,
        $etudiant_id,
        $admin_id
    ]);

    // 🔒 Livre indisponible
    $pdo->prepare("
        UPDATE livre 
        SET disponible = 0 
        WHERE id = ?
    ")->execute([$idLivre]);

    $pdo->commit();

    header("Location: /biblio/emprunt/index.php?success=1");
    exit;

} catch (Exception $e) {
    $pdo->rollBack();
    die("Erreur emprunt : " . $e->getMessage());
}


