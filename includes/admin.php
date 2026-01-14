<?php
if ($_SESSION['user_role'] !== 'admin') {
    header("Location: /biblio/index.php");
    exit;
}