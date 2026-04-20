<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <section>
        <h2>inscription</h2>
        <form action="../back/auth.php" method="POST" id="formReg">
            <input type="text" name="nom_complet" placeholder="Nom complet" required>
            <input type="email" name="email" placeholder="email" required>
            <input type="password" name="pass" placeholder="mot de passe" required>
            <button type="submit" name="signup">S'inscrire </button>
        </form>
    </section>
    <script src="../js/script.js"></script>
    
</body>
</html>