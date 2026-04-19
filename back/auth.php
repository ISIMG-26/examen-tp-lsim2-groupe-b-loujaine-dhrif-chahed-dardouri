<?php
include('db.php');

//inscription
if(isset($_POST['signup'])){
    $nom=$_POST['nom_complet'];
    $email=$_POST['email'];
    $pass=password_hash($_POST['pass'],PASSWORD_DEFAULT);

    $query="insert into utilisateurs (nom_complet, email, mot_de_passe)values('$nom','$email','$pass')";
    if(mysqli_query($conn, $query)){header("location: ../html/connexion.php");}

}

//connexion
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $res =mysqli_query($conn,"select * from utulisateurs where email='$email'");
    $user=mysqli_fetch_assoc($res);

    if($user && password_verify($pass, $user[mot_de_pass])){
         $_SESSION['user']= $user['nom_complet'];
         header("location: ../index.php");
    
    }else{echo"Email ou mot de passe incorrect!";}

}
?>
