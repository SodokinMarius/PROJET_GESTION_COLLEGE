<!--?php

    session_start();
$Ouvresession=$_SESSION['pseudo'];
setcookie('PSEUDO',$Ouvresession,time()+365*24*60*60,null,null,False,true);
?-->

<!Doctype html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initiale-scale=1">
        <link rel="stylesheet" href="styles/Forme_accueil.css">
</head>
<body>
    

<?php
try{
    $connexion=new PDO("mysql:host=localhost;dbname=gestion_bd_college",'root','');
    $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $connexion->exec("SET NAMES UTF8");
   // echo '<strong>Tout s\'est bien passé</strong>';
 }
 catch(PDOException $e){
     die('Erreur de connexion !'.$e->getMessage());
 } 
 
 include_once("Menu_Entete.php");
   ?>
 <article></article>
<?php include_once("Menu_verticale.php"); ?>
</body>
</html>
