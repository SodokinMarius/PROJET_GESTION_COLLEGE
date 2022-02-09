<?php
session_start();
?>

 <?php
 //$connexion=include_once("Connexion_au_Serveur.php");
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

    if(($_POST['matricule']!='') AND ($_POST['nomEtu']!='') AND
     ($_POST['prenomEtu']!='') AND ($_POST['dateNaissance']!='')
        AND ($_POST['LieuNaissance']!='') AND ($_POST['sexe']!='') 
        AND ($_POST['age']!='') AND ($_POST['telephone']!='')
          AND ($_POST['Admail']!='')  AND $_POST['age']>0){
               
                $response =$connexion->prepare("INSERT INTO  eleve(matricule,nomEtu,prenomEtu,dateNaissance,LieuNaissance,sexe,age,
                telephone,Admail)
                 VALUES(?,?,?,?,?,?,?,?,?)");

                 $insertion=$response->execute(array($_POST['matricule'],$_POST['nomEtu'],$_POST['prenomEtu'],$_POST['dateNaissance'],
                 $_POST['LieuNaissance'],$_POST['sexe'],$_POST['age'],$_POST['telephone'],$_POST['Admail']));
                 
            }
            
          else{
              header("Location:Incription_Etudiant.php");
              echo '<strong>Erreur ! Une erreur s\'est produite ou une des informations n\'est pas renseignée ! </strong>'; 
          }
          if(isset($_POST['pays']) AND isset($_POST['departement']) AND isset($_POST['commune'])
             AND isset($_POST['arrondissement']) AND isset($_POST['quartier']) AND isset($_POST['rue'])){
                $requete2=$connexion->prepare("INSERT INTO adresse_el(pays,departement,commune,arrondissement,quartier,rue)
          VALUES(?,?,?,?,?,?)");

          $insertion2=$requete2->execute(array($_POST['pays'],$_POST['departement'],
          $_POST['commune'],$_POST['arrondissement'],$_POST['quartier'],$_POST['rue']));

          $requete2->closeCursor();
        }
          else {
           
              echo 'Erreur ! Reverifiez vos informations </br';
          }
          
     ?>
 