<?php include "../includes/head.php"; ?>
<?php include "../includes/navbar.php"; ?>

<div class="main-content">
    <h2 class="page-title mb-4">👨‍🎓 Gestion des Étudiants</h2>

    <a href="ajouter.php" class="btn btn-primary mb-3 rounded-pill px-4">+ Ajouter un étudiant</a>

    <div class="card p-3">
        <table class="table table-hover align-middle text-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>De Paule</td>
                    <td>Jean</td>
                    <td>jean@example.com</td>
                    <td>
                        <a class="btn btn-warning btn-sm rounded-pill">✏️</a>
                        <a class="btn btn-danger btn-sm rounded-pill">🗑</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Martin</td>
                    <td>Claire</td>
                    <td>claire@example.com</td>
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