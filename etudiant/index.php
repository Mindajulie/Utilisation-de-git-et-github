<?php
include "../includes/auth.php";
include "../includes/admin.php";
include "../includes/config.php";

$etudiants = $pdo->query("
    SELECT * FROM etudiant ORDER BY created_at DESC
")->fetchAll();
?>

<?php include "../includes/head.php"; ?>
<?php include "../includes/navbar.php"; ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>🎓 Gestion des étudiants</h3>
        <a href="add.php" class="btn btn-info">
            ➕ Ajouter
        </a>
    </div>

    <div class="card p-4">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Classe</th>
                    <th>Adresse</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($etudiants as $e): ?>
                <tr>
                    <td><?= htmlspecialchars($e["nom"]) ?></td>
                    <td><?= htmlspecialchars($e["prenom"]) ?></td>
                    <td><?= htmlspecialchars($e["classe"]) ?></td>
                    <td><?= htmlspecialchars($e["adresse"]) ?></td>
                    <td class="text-end">
                        <a href="edit.php?id=<?= $e["id"] ?>" class="btn btn-sm btn-warning">✏️</a>
                        <a href="delete.php?id=<?= $e["id"] ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Supprimer cet étudiant ?')">
                           🗑️
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

            <?php if (count($etudiants) === 0): ?>
                <tr><td colspan="5">Aucun étudiant</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
