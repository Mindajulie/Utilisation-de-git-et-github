<?php include "includes/head.php"; ?>
<?php include "includes/navbar.php"; ?>

<div class="main-content">
    <h2 class="page-title mb-4">Dashboard</h2>

    <!-- CARTES STATISTIQUES -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card p-4">
                <small>Total étudiants</small>
                <h2>120</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <small>Total livres</small>
                <h2>85</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <small>Emprunts actifs</small>
                <h2>18</h2>
            </div>
        </div>
    </div>

    <!-- CARTES DE NAVIGATION -->
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card p-4">
                <h4>👨‍🎓 Étudiants</h4>
                <p>Gestion des étudiants</p>
                <a href="etudiants/index.php" class="btn btn-primary mt-2">Ouvrir</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <h4>📘 Livres</h4>
                <p>Catalogue des livres</p>
                <a href="livres/index.php" class="btn btn-primary mt-2">Ouvrir</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <h4>🔄 Emprunts</h4>
                <p>Gestion des emprunts</p>
                <a href="emprunts/index.php" class="btn btn-primary mt-2">Ouvrir</a>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>