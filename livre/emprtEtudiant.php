<?php
include "../includes/auth.php";
include "../includes/admin.php"; // bloque non-admin
include "../includes/config.php";

// Sécurité POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$livre_id    = $_POST["livre_id"] ?? null;
$etudiant_id = $_POST["etudiant_id"] ?? null;

if (!$livre_id || !$etudiant_id) {
    header("Location: index.php");
    exit;
}

// Vérifier que le livre existe et est disponible
$stmt = $pdo->prepare("
    SELECT id, disponible
    FROM livre
    WHERE id = ?
");
$stmt->execute([$livre_id]);
$livre = $stmt->fetch();

if (!$livre || !$livre["disponible"]) {
    header("Location: index.php");
    exit;
}

// Vérifier que l’étudiant existe
$stmt = $pdo->prepare("
    SELECT id
    FROM etudiant
    WHERE id = ?
");
$stmt->execute([$etudiant_id]);
if (!$stmt->fetch()) {
    header("Location: index.php");
    exit;
}

// TRANSACTION (important)
$pdo->beginTransaction();

try {
    // 1️⃣ Insérer l’emprunt
    $stmt = $pdo->prepare("
        INSERT INTO emprunt (
            livre_id,
            emprunteur_type,
            etudiant_id,
            admin_id,
            dateEmprunt
        ) VALUES (?, 'etudiant', ?, ?, CURDATE())
    ");
    $stmt->execute([
        $livre_id,
        $etudiant_id,
        $_SESSION["user_id"]
    ]);

    // 2️⃣ Rendre le livre indisponible
    $stmt = $pdo->prepare("
        UPDATE livre
        SET disponible = 0
        WHERE id = ?
    ");
    $stmt->execute([$livre_id]);

    $pdo->commit();

    header("Location: ../emprunt/index.php?success=1");
    exit;

} catch (Exception $e) {
    $pdo->rollBack();
    // DEBUG possible :
    // die($e->getMessage());
    header("Location: index.php?error=1");
    exit;
}
