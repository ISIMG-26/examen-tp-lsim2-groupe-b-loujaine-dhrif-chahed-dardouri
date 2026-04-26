<?php
include('db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../html/connexion.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// ADD TO CART
if (isset($_POST['add_to_cart'])) {
    $id_prod = mysqli_real_escape_string($conn, $_POST['id_prod']);

    // Check if product already in cart
    $check = mysqli_query($conn, "SELECT * FROM panier WHERE id_user = '$user_id' AND id_prod = '$id_prod'");
    
    if (mysqli_num_rows($check) > 0) {
        mysqli_query($conn, "UPDATE panier SET quantite = quantite + 1 WHERE id_user = '$user_id' AND id_prod = '$id_prod'");
    } else {
        mysqli_query($conn, "INSERT INTO panier (id_user, id_prod, quantite) VALUES ('$user_id', '$id_prod', 1)");
    }
    header("Location: ../index.php?success=Added to cart");
}

// REMOVE FROM CART
if (isset($_GET['remove'])) {
    $id_cart = mysqli_real_escape_string($conn, $_GET['remove']);
    mysqli_query($conn, "DELETE FROM panier WHERE id = '$id_cart' AND id_user = '$user_id'");
    header("Location: ../html/panier.php");
}
?>