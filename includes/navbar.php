<nav class="navbar navbar-expand-lg navbar-dark px-4" style="background:#020617;">
  <a class="navbar-brand fw-bold" href="/biblio/index.php">⚡️ Biblio</a>
  <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="nav">
    <ul class="navbar-nav ms-auto gap-3">
      <li class="nav-item"><a class="nav-link" href="/biblio/index.php"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
      <li class="nav-item"><a class="nav-link" href="/biblio/etudiant/"><i class="bi bi-people"></i> Étudiants</a></li>
      <li class="nav-item"><a class="nav-link" href="/biblio/livre/"><i class="bi bi-book"></i> Livres</a></li>
      <li class="nav-item"><a class="nav-link" href="/biblio/emprunt/"><i class="bi bi-arrow-left-right"></i> Emprunts</a></li>
      <li class="nav-item"><a class="nav-link" href="/biblio/fichiers/"><i class="bi bi-cloud-upload"></i> Fichiers</a></li>
      <?php if ($_SESSION['user_role'] === 'admin'): ?>
        <li class="nav-item"><a class="nav-link text-warning" href="/biblio/users/"><i class="bi bi-shield-lock"></i> Admin</a></li>
      <?php endif; ?>
      <li class="nav-item"><a class="btn btn-outline-info ms-3" href="/biblio/logout.php"><i class="bi bi-box-arrow-right"></i></a></li>
    </ul>
  </div>
</nav>