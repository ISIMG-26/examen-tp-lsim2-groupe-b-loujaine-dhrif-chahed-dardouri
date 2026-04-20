<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$conn = mysqli_connect("localhost", "root", "", "parfum_db");
if (!$conn) {
    die("La connexion à la base de données a échoué: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");
date_default_timezone_set('Africa/Tunis');
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>