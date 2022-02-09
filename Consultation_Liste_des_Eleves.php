<?php
session_start();
?>
<!Doctype html >
<html>
    <head>
<title>Liste des élèves Inscrits</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8" />
<style>
body{
        background-color: lightgreen;
    }
    
label:{
    font-size:1.5rem;
}
input:last-child{
    
}
a,input[type="submit"]{
    text-decoration:none;
    color:white;
    font-family:arial;
    font-weight:bold;
    width:150px;
    height: 30px;
    box-shadow :5px 5px ;
    background-color:black;
    margin-left:50%;
    font-size: 1rem;
   
}   
    div{
    height: 300px;
    background-color:grey;
    border: 2px groove red;
box-shadow:30px 10px 5px blue ;
margin-top:10%;
margin-left:20%;
margin-right:20%;
color:white;
padding:10%;
font-size: 2rem;
border-radius:10%;

    }
   p{
        width:auto;
        height:20%;
        color: white;
        font-weight:bold;
    }
    table{
        border:2px solid dashed;
        font-size:25px;
        font-weight:bold;
        text-transform:uppercase;
        font-family:arial;
    }
    </style>

 </head>
 <body>
     <div>
 <?php
 //require_once'Connexion_au_serveur.php';
    $server='localhost';
    $login='root';
    $password="";
    
    try {
        $connexion=new PDO("mysql:host=$server;dbname=gestion_bd_college",$login,$password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connexion->exec('SET NAMES utf8');
        echo 'Connexion etablie avec succès</br>';
    
    }
    catch (PDOException $e){
     die( 'Error of connexion: '.$e->getMessage());
    }

    /*if(isset($_POST['matricule']) AND isset($_POST['nomEtu']) AND isset($_POST['prenomEtu']) AND isset($_POST['dateNaissance'])
        AND isset($_POST['LieuNaissance']) AND isset($_POST['sexe']) AND isset($_POST['age']) AND isset($_POST['telephone'])
          AND isset($_POST['Admail'])  AND $_POST['age']>0){*/

                echo 'Les eleves inscirs sur la plateforme</br>';
                 $response=$connexion->query("SELECT matricule,nomEtu,prenomEtu,dateNaissance,NOW() AS DATET FROM eleve");

                 while ($temp=$response->fetch()){
                     echo $temp['matricule'].' '.$temp['nomEtu'].' '.$temp['prenomEtu'].' '.$temp['dateNaissance'].$temp['DATET'].' <br>';
                 }
                 
          /*  }
          else{
              echo '<strong>Erreur ! Une erreur s\'est produite ou une des informations n\'est pas renseignée ! </strong>'; 
          }
          if(isset($_POST['pays']) AND isset($_POST['departement']) AND isset($_POST['commune'])
             AND isset($_POST['arrondissement']) AND isset($_POST['quartier']) AND isset($_POST['rue'])){*/
               

        $requete2=$connexion->query("SELECT idAdressEl,pays,departement,commune,arrondissement,quartier,rue, NOW() AS datins FROM adresse_el");
        echo '<table border="2">' ;
        echo '<tr>' ;
        echo '<th>Identifiant d\'adresse</th><th>Pays</th><th>Departement</th><th>Commune</th>
        <th>Arrondissement</th><th>Quartier</th><th>Rue</th>t<h>Date d\'inscription</th>';
        echo '</tr><br>'  ;           
        
        while($donne=$requete2->fetch()){
           echo '<tr>';
                echo '<td> '.$donne['idAdressEl'].' </td><td> '.$donne['pays'].' </td><td> '.
               $donne['departement'].'</td><td> '.$donne['commune'].' </td><td> '.$donne['arrondissement'].
                ' </td><td> '.$donne['quartier'].' </td><td> '.$donne['rue'].'</td><td>'.$donne['datins'].'</td>';
           echo '</tr><br>';
       
        }
        echo '</table>';
        $requete2->closeCursor();
         /* }
          else {
              echo 'Erreur ! Reverifiez vos informations </br';
          }*/
          
     ?>
     </div>
 </body>
</html>