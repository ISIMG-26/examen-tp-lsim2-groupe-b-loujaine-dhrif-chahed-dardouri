<?php include('back/db.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accueil</title>
</head>
<body>
    <header>
        <h1>GlowScent Parfums</h1>
        <nav>
            <a href="index.php">Accuiel</a>
            <a href="html/inscreption.php">inscreption</a>
            <a href="html/connexion.php">connexion</a>
        </nav>
    </header>

    <section>
        <h2>Notre Collection</h2>
        <div class="container">
            <?php
            $sql ="SELECT p.*,c.nom_cat from produits p JOIN categories c on p.id_cat = c.id";
            $res = mysqli_query($conn, $sql);
            while($row = mysqli_assoc($res)){
                echo "<div class='card'>";
                echo "<img src='images/'".$row['image_url']."width='150'>";
                echo "<h3>".$row['nom_prod']."</h3>";
                echo "<b>".$row['nom_cat']."</b>";
                echo "<p>".$row['prix']."DT</p>";
                echo "</div>"

            }
            ?>
        </div>
    </section>
    <script src="js/script.js"></script>
</body>
</html>