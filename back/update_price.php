<?php
include('db.php');
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php?error=Unauthorized");
    exit();
}
if (isset($_POST['id_prod']) && isset($_POST['nouveau_prix'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id_prod']);
    $prix = mysqli_real_escape_string($conn, $_POST['nouveau_prix']);
    $sql = "UPDATE produits SET prix = '$prix' WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../index.php?success=PriceUpdated");
        exit();
    } else {
        header("Location: ../index.php?error=UpdateFailed");
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>