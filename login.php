<?php
include "includes/config.php";
include "includes/secur.php";

// Si déjà connecté, rediriger vers dashboard
if(isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Vérification CSRF
    if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
        die("CSRF détecté !");
    }

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password,$user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nom'] = $user['nom'];
        $_SESSION['user_role'] = $user['role'];

        header("Location: index.php");
        exit;
    } else {
        $error = "Email ou mot de passe incorrect";
    }
}
?>

<?php include "includes/head.php"; ?>
<div class="container mt-5">
    <h2 class="mb-4">Connexion</h2>

    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <?php if(isset($_GET['success'])) echo "<div class='alert alert-success'>Compte créé ! Connectez-vous.</div>"; ?>

    <form method="post">
        <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-future">Se connecter</button>
    </form>

    <p class="mt-2">Pas encore de compte ? <a href="register.php">S'inscrire</a></p>
</div>
<?php include "includes/footer.php"; ?>