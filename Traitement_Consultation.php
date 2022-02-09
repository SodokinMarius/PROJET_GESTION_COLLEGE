<?php session_start();?>
<!Doctype html>
<html>
    <head>
        <title>Traitement et consultation des résultats</title>
        <meta charset="UTF-8"/>
</head>
<body>
    <?php 
    try{
        $connexion=new PDO("mysql:host=localhost;dbname=gestion_BD_College",'root','');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connexion->exec("SET NAMES UTF8");
        echo 'La connexion a bien aboutit<br>';

    }
    catch(PDOException $erreur){
        die('Erreur de Connexion'.$erreur->getMessage());
    }
    
    if(isset($_POST['resultat[]']) AND !empty($_POST['resultat[]']) AND isset($_POST['id_consult'])
     OR !empty($_POST['id_consult'])){
        
        $recherche=$_POST['id_consult'];
        $connexion->prepare("SELECT * FROM ELEVE WHERE matricule=$recherche");
            $requete=$connexion->excecute();

            echo '<table border="2">';
            echo '<tr> <th>Matricule</th><th>Nom</th><th>Prenoms</th><th>sexe</th></tr>';
            while($temp=$requete->fetch()){
                echo '<tr><td>'.$temp['matricule'].'</td><td>'.$temp['nomEtu'].
                '</td><td>'.$temp['prenomEtu'].' </td><td>'.$temp['sexe'].' </td></tr><br>';
            }
            echo '</table>';
           
            $requete->closeCursor();
    }
    else{
        echo 'Erreur ! un champs n\'est pas renseigné ou erreur de saisie </br>';
    }    ?>
</body>
    </html>
    