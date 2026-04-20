<?php include('../back/db.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - GlowScent</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <header>
        <h1>GlowScent</h1>
        <nav>
            <a href="../index.php">Accueil</a>
            <button id="darkBtn">Mode Sombre</button>
        </nav>
    </header>

    <main>
        <section>
            <div style="color: var(--gold); font-size: 2rem; margin-bottom: 10px;">✧</div>
            <h2>Inscription</h2>
            <p class="category">Devenez membre de la maison GlowScent</p>
            
            <?php if(isset($_GET['error'])): ?>
                <p style="color: #ff6b6b; font-size: 0.8rem; margin-bottom: 15px;">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </p>
            <?php endif; ?>

            <form action="../back/auth.php" method="POST" id="formReg">
                <input type="text" name="nom_complet" placeholder="Nom complet" required>
                <input type="email" name="email" placeholder="Adresse E-mail" required>
                <input type="password" name="pass" placeholder="Mot de passe (min. 6)" required>
                <button type="submit" name="signup">S'inscrire</button>
            </form>

            <p style="margin-top: 25px; font-size: 0.85rem; opacity: 0.8;">
                Déjà inscrit ? <a href="connexion.php" style="color: var(--gold); text-decoration: none; font-weight: bold;">Se connecter</a>
            </p>
        </section>
    </main>

    <script src="../javascript/script.js"></script>
</body>
</html>