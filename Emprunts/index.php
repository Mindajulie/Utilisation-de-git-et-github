<?php include "../includes/head.php"; ?>
<?php include "../includes/navbar.php"; ?>

<div class="main-content">
    <h2 class="page-title mb-4">🔄 Gestion des Emprunts</h2>

    <a href="ajouter.php" class="btn btn-primary mb-3 rounded-pill px-4">+ Ajouter un emprunt</a>

    <div class="card p-3">
        <table class="table table-hover align-middle text-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Étudiant</th>
                    <th>Livre</th>
                    <th>Date emprunt</th>
                    <th>Retour prévu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Jean De Paule</td>
                    <td>PHP pour Débutants</td>
                    <td>2026-01-13</td>
                    <td>2026-01-20</td>
                    <td>
                        <a class="btn btn-warning btn-sm rounded-pill">✏️</a>
                        <a class="btn btn-danger btn-sm rounded-pill">🗑</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Claire Martin</td>
                    <td>JavaScript Moderne</td>
                    <td>2026-01-10</td>
                    <td>2026-01-17</td>
                    <td>
                        <a class="btn btn-warning btn-sm rounded-pill">✏️</a>
                        <a class="btn btn-danger btn-sm rounded-pill">🗑</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include "../includes/footer.php"; ?>