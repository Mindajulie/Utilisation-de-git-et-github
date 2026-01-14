<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: /biblio/login.php");
    exit;
}