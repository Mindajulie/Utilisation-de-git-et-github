<?php
// include "includes/config.php";
// include "includes/auth.php";
include "includes/head.php";
include "includes/navbar.php";

// Stats globales
$stats = [
    'etudiants' => $conn->query("SELECT COUNT(*) FROM etudiant")->fetchColumn(),
    'livres' => $conn->query("SELECT COUNT(*) FROM livre")->fetchColumn(),
    'emprunts' => $conn->query("SELECT COUNT(*) FROM emprunt WHERE date_retour IS NULL")->fetchColumn()
];
?>

<div class="container mt-5">
<h2 class="mb-4">📊 Tableau de bord</h2>
<div class="row g-4">

<?php if($_SESSION['user_role'] === 'admin'): ?>
  <!-- Admin Dashboard -->
  <div class="col-md-3">
    <div class="card p-4 hover text-center">
      <h5>Étudiants</h5>
      <h2 class="counter" data-target="<?= $stats['etudiants'] ?>">0</h2>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-4 hover text-center">
      <h5>Livres</h5>
      <h2 class="counter" data-target="<?= $stats['livres'] ?>">0</h2>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-4 hover text-center">
      <h5>Emprunts en cours</h5>
      <h2 class="counter" data-target="<?= $stats['emprunts'] ?>">0</h2>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card p-4 hover text-center">
      <h5>Gestion utilisateurs</h5>
      <i class="bi bi-shield-lock fs-1 text-warning"></i>
    </div>
  </div>

  <!-- Graphique emprunts -->
  <div class="col-12 mt-4">
    <div class="card p-4 hover">
      <h5>Emprunts par mois</h5>
      <canvas id="empruntsChart"></canvas>
    </div>
  </div>

<?php else: ?>
  <!-- User Dashboard -->
  <div class="col-md-4">
    <div class="card p-4 hover text-center">
      <h5>Mes Emprunts</h5>
      <?php
      $user_id = $_SESSION['user_id'];
      $user_emprunts = $conn->prepare("SELECT COUNT(*) FROM emprunt WHERE etudiant_id=? AND date_retour IS NULL");
      $user_emprunts->execute([$user_id]);
      $count = $user_emprunts->fetchColumn();
      ?>
      <h2 class="counter" data-target="<?= $count ?>">0</h2>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card p-4 hover text-center">
      <h5>Livres disponibles</h5>
      <h2 class="counter" data-target="<?= $stats['livres'] ?>">0</h2>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card p-4 hover text-center">
      <h5>Notifications</h5>
      <i class="bi bi-bell fs-1"></i>
    </div>
  </div>
<?php endif; ?>

</div>
</div>

<?php include "includes/footer.php"; ?>

<?php if($_SESSION['user_role'] === 'admin'): ?>
<script>
// Graphique Emprunts par mois
const ctx = document.getElementById('empruntsChart').getContext('2d');

<?php
$labels = [];
$data = [];
for($m=1;$m<=12;$m++){
  $labels[] = date("F", mktime(0,0,0,$m,1));
  $stmt = $conn->prepare("SELECT COUNT(*) FROM emprunt WHERE MONTH(date_emprunt)=?");
  $stmt->execute([$m]);
  $data[] = $stmt->fetchColumn();
}
?>

const empruntsChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?= json_encode($labels) ?>,
    datasets: [{
      label: 'Emprunts',
      data: <?= json_encode($data) ?>,
      backgroundColor: 'rgba(99,102,241,0.7)',
      borderRadius: 10
    }]
  },
  options: {
    responsive:true,
    plugins:{ legend:{display:false}, tooltip:{mode:'index',intersect:false} },
    scales:{ y:{beginAtZero:true,ticks:{stepSize:1}} }
  }
});
</script>
<?php endif; ?>