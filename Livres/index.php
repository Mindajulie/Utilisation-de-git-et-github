<?php include "../includes/head.php"; ?>
<?php include "../includes/navbar.php"; ?>

<div class="main-content">
    <h2 class="page-title mb-4">📘 Gestion des Livres</h2>

    <a href="ajouter.php" class="btn btn-primary mb-3 rounded-pill px-4">+ Ajouter un livre</a>

    <div class="card p-3">
        <table class="table table-hover align-middle text-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Année</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>PHP pour Débutants</td>
                    <td>Jean Dupont</td>
                    <td>2025</td>
                    <td>
                        <a class="btn btn-warning btn-sm rounded-pill">✏️</a>
                        <a class="btn btn-danger btn-sm rounded-pill">🗑</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>JavaScript Moderne</td>
                    <td>Claire Martin</td>
                    <td>2026</td>
                    <td>
                        <a class="btn btn-warning btn-sm rounded-pill">✏️</a>
                        <a href="g" class="btn btn-danger btn-sm rounded-pill">🗑</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include "../includes/footer.php"; ?>