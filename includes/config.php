<?php
session_start();
session_regenerate_id(true);

try {
    $conn = new PDO(
        "mysql:host=localhost;dbname=biblio;charset=utf8",
        "root",
        "",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Erreur DB : " . $e->getMessage());
}