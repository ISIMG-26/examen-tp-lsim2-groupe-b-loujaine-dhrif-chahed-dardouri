<?php include('back/db.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlowScent Parfums | Accueil</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <header>
        <div class="logo">
            <h1>GlowScent Parfums</h1>
        </div>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="html/inscription.php">Inscription</a>
            <a href="html/connexion.php">Connexion</a>
        </nav>
    </header>

    <main>
        <section class="collection">
            <h2>Notre Collection</h2>
            <div class="product-grid">
                <?php
                $sql = "SELECT p.*, c.nom_cat FROM produits p JOIN categories c ON p.id_cat = c.id";
                $res = mysqli_query($conn, $sql);

                if ($res && mysqli_num_rows($res) > 0) {
                    while($row = mysqli_fetch_assoc($res)) {
                        // htmlspecialchars protects against Cross-Site Scripting (XSS)
                        $name = htmlspecialchars($row['nom_prod']);
                        $cat = htmlspecialchars($row['nom_cat']);
                        $price = htmlspecialchars($row['prix']);
                        $img = htmlspecialchars($row['Image_url']);

                        echo "<div class='card'>";
                        echo "<img src='images/" . $img . "' alt='" . $name . "' width='150' height='150'>";
                        echo "<h3>" . $name . "</h3>";
                        echo "<span class='category'>" . $cat . "</span>";
                        echo "<p class='price'>" . $price . " DT</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Aucun produit disponible pour le moment.</p>";
                }
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> GlowScent Parfums. Tous droits réservés.</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>