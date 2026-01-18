<?php
session_start();
require "../includes/config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user["password"])) {

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["nom"] = $user["nom"];
        $_SESSION["prenom"] = $user["prenom"];
        $_SESSION["role"] = $user["role"];

        
        if ($user["role"] === "admin") {
            header("Location: ../dashboard/admin/index.php");
        } else {
            header("Location: ../dashboard/user/index.php");
        }
        exit;

    } else {
        $error = "Email ou mot de passe incorrect";
    }
}
?>
<?php include "../includes/head.php"; ?>

<div class="auth-page">
    <div class="auth-card">
        <h3>🔐 Connexion</h3>

        <form method="POST">
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
            </div>

            <button class="btn btn-futur">Se connecter</button>

            <p class="mt-3">
                Pas encore inscrit ?
                <a href="register.php">Créer un compte</a>
            </p>
        </form>
    </div>
</div>

<?php include "../includes/footer.php"; ?>
