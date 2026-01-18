<?php
if ($_SESSION["role"] !== "admin") {
    header("Location: ../dashboard/user/index.php");
    exit;
}
