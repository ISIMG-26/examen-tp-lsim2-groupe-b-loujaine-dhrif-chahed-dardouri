<?php
include('db.php');
if (isset($_POST['signup'])) {
    $nom = mysqli_real_escape_string($conn, $_POST['nom_complet']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']); 
    $checkEmail = "SELECT * FROM utilisateurs WHERE email='$email'";
    $runCheck = mysqli_query($conn, $checkEmail);
    if (mysqli_num_rows($runCheck) > 0) {
        header("Location: ../html/inscription.php?error=Email already exists");
        exit();
    } else {
        $sql = "INSERT INTO utilisateurs (nom_complet, email, mot_de_passe, role) 
                VALUES ('$nom', '$email', '$pass', 'client')";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: ../html/connexion.php?success=Account created successfully");
            exit();
        } else {
            header("Location: ../html/inscription.php?error=Registration failed");
            exit();
        }
    }
}
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $sql = "SELECT * FROM utilisateurs WHERE email='$email' AND mot_de_passe='$pass'";
    $res = mysqli_query($conn, $sql);
    if ($res && mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['nom'] = $row['nom_complet'];
        $_SESSION['role'] = $row['role'];
        header("Location: ../index.php?connected=true");
        exit(); 
    } else {
        header("Location: ../html/connexion.php?error=Invalid email or password");
        exit();
    }
}
?>