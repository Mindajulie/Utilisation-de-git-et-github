<?php
require "../includes/auth.php";
require "../includes/admin.php";
require "../includes/config.php";

$id = (int)($_GET["id"] ?? 0);

if ($id === $_SESSION["user_id"]) {
    header("Location: index.php");
    exit;
}

$pdo->prepare("DELETE FROM users WHERE id = ?")->execute([$id]);

header("Location: index.php");
exit;
