<?php
require "../includes/auth.php";
require "../includes/admin.php";
require "../includes/config.php";

$users = $pdo->query("
    SELECT id, nom, prenom, email, role, created_at
    FROM users
    ORDER BY created_at DESC
")->fetchAll();
?>

<?php include "../includes/head.php"; ?>
<?php include "../includes/navbar.php"; ?>

<div class="container mt-5">
    <h3 class="mb-4">👥 Gestion des utilisateurs</h3>

    <div class="card p-4">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Inscription</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= htmlspecialchars($u["prenom"]." ".$u["nom"]) ?></td>
                    <td><?= htmlspecialchars($u["email"]) ?></td>

                    <td>
                        <span class="badge <?= $u["role"] === "admin" ? "bg-danger" : "bg-info" ?>">
                            <?= strtoupper($u["role"]) ?>
                        </span>
                    </td>

                    <td><?= date("d/m/Y", strtotime($u["created_at"])) ?></td>

                    <td>
                        <a href="edit.php?id=<?= $u["id"] ?>" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>

                        <?php if ($u["id"] !== $_SESSION["user_id"]): ?>
                            <a href="delete.php?id=<?= $u["id"] ?>"
                               onclick="return confirmDelete(this)"
                               class="btn btn-sm btn-danger">
                               <i class="fas fa-trash"></i>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
