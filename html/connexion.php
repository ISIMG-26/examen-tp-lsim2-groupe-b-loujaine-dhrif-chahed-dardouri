<?php include('../back/db.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - GlowScent</title>
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
            <h2>Connexion</h2>
            <p class="category">Entrez vos identifiants pour continuer</p>
            
            <?php if(isset($_GET['error'])): ?>
                <p style="color: #ff6b6b; font-size: 0.85rem; margin-bottom: 15px; background: rgba(255, 107, 107, 0.1); padding: 10px; border-radius: 8px;">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </p>
            <?php endif; ?>

            <?php if(isset($_GET['success'])): ?>
                <p style="color: #4CAF50; font-size: 0.85rem; margin-bottom: 15px; background: rgba(76, 175, 80, 0.1); padding: 10px; border-radius: 8px;">
                    <?php echo htmlspecialchars($_GET['success']); ?>
                </p>
            <?php endif; ?>
            
            <form action="../back/auth.php" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="pass" placeholder="Mot de passe" required>
                <button type="submit" name="login">Se connecter</button>
            </form>

            <p style="margin-top: 25px; font-size: 0.85rem; opacity: 0.8;">
                Pas encore de compte ? <a href="inscription.php" style="color: var(--gold); text-decoration: none; font-weight: bold;">Créer un compte</a>
            </p>
        </section>
    </main>

    <script src="../javascript/script.js"></script>
</body>
</html>