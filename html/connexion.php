<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <h2>Connexion</h2>
        <form action="../back/auth.php" methode="POST">
            <input type="text" name="email" placeholder="Email" required>
            <input type="text" name="pass" placeholder="Mot de passe" required>
            <button type="submit" name="login">Se connecter </button>
        </form>
    </section>
</body>
</html>