<?php
include('db.php');

$q = isset($_GET['q']) ? mysqli_real_escape_string($conn, $_GET['q']) : '';

$sql = "SELECT p.*, c.nom_cat FROM produits p 
        JOIN categories c ON p.id_cat = c.id 
        WHERE p.nom_prod LIKE '%$q%' 
        OR p.marque LIKE '%$q%' 
        OR c.nom_cat LIKE '%$q%'";

$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)) {
        echo "<div class='card'>";
            echo "<img src='images/" . htmlspecialchars($row['Image_url']) . "' alt='Parfum'>";
            echo "<h3>" . htmlspecialchars($row['nom_prod']) . "</h3>";
            echo "<span class='category'>" . htmlspecialchars($row['nom_cat']) . "</span>";
            echo "<p class='price'>" . htmlspecialchars($row['prix']) . " DT</p>";

            if(isset($_SESSION['nom'])) {
                echo "<form action='back/manage_cart.php' method='POST'>";
                    echo "<input type='hidden' name='id_prod' value='".$row['id']."'>";
                    echo "<button type='submit' name='add_to_cart' class='buy-btn'>Ajouter au panier</button>";
                echo "</form>";
            }
        echo "</div>";
    }
} else {
    echo "<p style='grid-column: 1/-1; text-align: center; padding: 50px; opacity: 0.5;'>Aucune fragrance trouvée pour \"".htmlspecialchars($q)."\"</p>";
}
?>