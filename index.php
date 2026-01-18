<?php
session_start();

/* DEBUG TEMPORAIRE (IMPORTANT) */
if (!isset($_SESSION)) {
    die("Session non démarrée");
}

/* Non connecté */
if (!isset($_SESSION["user_id"])) {
    header("Location: /biblio/auth/login.php");
    exit;
}

/* Admin */
if ($_SESSION["role"] === "admin") {
    header("Location: /biblio/dashboard/admin/index.php");
    exit;
}

/* User */
header("Location: /biblio/dashboard/user/index.php");
exit;
