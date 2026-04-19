<?php
$conn = mysqli_connect("localhost","root","","parfum_db");
if (!$conn) { die("Erreur de connexion");}
mysqli_set_charset($conn,"utf8");
?>