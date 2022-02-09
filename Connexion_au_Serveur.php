<?php
$server='localhost';
$login='root';
$password=' ';

try {
    $connexion= new PDO("mysql:host=$server;dbname=gestion_bd_college",$login,$password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->exec('SET NAMES UTF8');
    echo 'Connexion etablie avec succès</br>';

}
catch (PDOException $e){
 die( 'Error of connexion: '.$e->getMessage());
}

?>