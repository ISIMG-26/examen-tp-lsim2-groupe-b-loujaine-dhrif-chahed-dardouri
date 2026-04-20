<?php include('back/db.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GlowScent Parfums</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<?php if(isset($_GET['connected']) && isset($_SESSION['nom'])): ?>
    <div class="connection-alert">
        You are now connected dear, <b><?php echo htmlspecialchars($_SESSION['nom']); ?></b> ✨
    </div>
<?php endif; ?>

<?php if(isset($_SESSION['nom'])): ?>
    <div class="welcome-sidebar">
        <span class="dot"></span> Welcome dear, <b><?php echo htmlspecialchars($_SESSION['nom']); ?></b>
    </div>
<?php endif; ?>

    <header>
        <h1>GlowScent</h1>
        <nav>
            <a href="index.php">Accueil</a>
            
            <?php if(isset($_SESSION['nom'])): ?>
                <span class="user-greeting">Hello dear, <b><?php echo htmlspecialchars($_SESSION['nom']); ?></b></span>
                <a href="back/logout.php" class="logout-link">Déconnexion</a>
            <?php else: ?>
                <a href="html/inscription.php">Inscription</a>
                <a href="html/connexion.php">Connexion</a>
            <?php endif; ?>
            
            <button id="darkBtn">Mode Sombre</button>
        </nav>
    </header>

    <main>
        <div class="hero-block">
            <h2>L'Essence de l'Élégance</h2>
            <p>Fragrances de Prestige • Signature Olfactive • Luxe</p>
            <div class="gold-divider"></div>
        </div>

        <section class="search-section">
            <input type="text" id="searchPerfume" placeholder="Rechercher une fragrance...">
        </section>

        <section class="collection">
            <div class="product-grid">
                <?php
                $sql = "SELECT p.*, c.nom_cat FROM produits p JOIN categories c ON p.id_cat = c.id";
                $res = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($res)) {
                    echo "<div class='card'>";
                        echo "<img src='images/" . htmlspecialchars($row['Image_url']) . "' alt='Parfum'>";
                        echo "<h3>" . htmlspecialchars($row['nom_prod']) . "</h3>";
                        echo "<span class='category'>" . htmlspecialchars($row['nom_cat']) . "</span>";
                        echo "<p class='price'>" . htmlspecialchars($row['prix']) . " DT</p>";

                        if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                            echo "<form action='back/update_price.php' method='POST' class='admin-edit-form'>";
                                echo "<input type='hidden' name='id_prod' value='".$row['id']."'>";
                                echo "<input type='number' step='0.01' name='nouveau_prix' placeholder='Prix...' required>";
                                echo "<button type='submit'>Modifier</button>";
                            echo "</form>";
                        }
                    echo "</div>";
                }
                ?>
            </div>
        </section>
    </main>

    <script src="javascript/script.js"></script>
</body>
</html>