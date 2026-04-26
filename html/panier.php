<?php include('../back/db.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Panier - GlowScent</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <header>
        <h1>GlowScent</h1>
        <nav><a href="../index.php">Retour Boutique</a></nav>
    </header>

    <main>
        <section style="max-width: 800px; width: 90%;">
            <h2>Votre Sélection</h2>
            <div class="gold-divider"></div>

            <?php
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT panier.id as cart_id, produits.nom_prod, produits.prix, panier.quantite 
                    FROM panier 
                    JOIN produits ON panier.id_prod = produits.id 
                    WHERE panier.id_user = '$user_id'";
            $res = mysqli_query($conn, $sql);
            $total_general = 0;

            if (mysqli_num_rows($res) > 0) {
                while($item = mysqli_fetch_assoc($res)) {
                    $subtotal = $item['prix'] * $item['quantite'];
                    $total_general += $subtotal;
                    echo "<div style='display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid #eee; padding: 15px 0;'>";
                        echo "<div>
                                <b>".htmlspecialchars($item['nom_prod'])."</b><br>
                                <small>Quantité: ".$item['quantite']."</small>
                              </div>";
                        echo "<div>
                                <span>".number_format($subtotal, 2)." DT</span>
                                <a href='../back/manage_cart.php?remove=".$item['cart_id']."' style='color:red; margin-left:15px; text-decoration:none;'>✕</a>
                              </div>";
                    echo "</div>";
                }
                echo "<h3 style='margin-top:20px; text-align:right;'>Total: <span style='color:var(--gold)'>".number_format($total_general, 2)." DT</span></h3>";
                echo "<button onclick='alert(\"Merci pour votre achat chez GlowScent!\")' style='width:100%; padding:15px; background:var(--gold); border:none; color:white; border-radius:10px; margin-top:20px; cursor:pointer; font-weight:bold;'>CONFIRMER L'ACHAT</button>";
            } else {
                echo "<p>Votre panier est vide.</p>";
            }
            ?>
        </section>
    </main>
</body>
</html>