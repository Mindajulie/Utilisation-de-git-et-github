<?php
include "../includes/auth.php";
include "../includes/admin.php";
include "../includes/config.php";

$id = $_GET["id"] ?? null;

$stmt = $pdo->prepare("DELETE FROM livre WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
