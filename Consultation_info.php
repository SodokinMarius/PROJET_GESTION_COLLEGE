<?php session_start();?>
<!Doctype html>
<html>
    <head>
        <title>Consulatations</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" width="device-with;initial-scale=1.0"/>

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
    form{
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

    }
   p{
        width:auto;
        height:20%;
        color: white;
        font-weight:bold;
    }
    h3{
        border:2px solid dashed;
        font-size:25px;
        font-weight:bold;
        text-transform:uppercase;
        font-family:arial;
    }
    </style>

    </head>

<body>
    <h1>Consultatation de vos résultats semestriels ou annuels</h1><br>
    <form action="Traitement_Consultation.php" method="POST">
        <label for="resultat1">Consulter les résultats d'un élève</label>
        <input type="checkbox" name="resultat[]" value="1"><br><br>
    <label for="option2">Consuilter les résultats d'un classe </label>
    <input type="checkbox" name="resultat[]" value="2"><br><br>
     <label for="Chercher">Entrer l'identifiant ou le code</label>
     <input type="research" name="consulte" placeholder="Rechercher"/><br><br>
   
    <button type="submit">Consulter</button>
</form>
<?php 
try{
    $connexion=new PDO("mysql:host=localhost;dbname=gestion_bd_college",'root','');
    $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_EXCEPTION);
    $connexion->exec("SET NAMES UTF8");
    echo 'La connexion a bien aboutit </br>';
}
catch(PDOException $e){
    die ('Error ! Une erreur s\'est produite : </br> '. $e->getMessage());
}

if(isset($_POST['matricule']) AND (!empty($_POST['matricule']))){

$Apsuppr=$connexion->prepare("SELECT matricule, nomEtu,prenomEtu,dateNaissance FROM eleve
WHERE matricule =? ");
$execution=$Apsuppr->execute(array($_POST['matricule']));
$execution-fetch();

$suppr=$connexion->prepare('DELETE FROM eleve WHERE matricule=?');

$request=$suppr->execute(array($_POST['matricule']));

echo 'L\'apprenant'. $execution['nomEtu']. ' '.$execution['prenomEtu'].
' né (é) le'.$execution['dateNaissance'].'et de Matricule '.$execution['matricule']. ' a rétirer avec succès<br>';



$modifier=$connexion->prepare('UPDATE eleve SET prenomEtu=:prenom_act WHERE matricule=:ident');
$execution=$modifier->execute(array('prenom_act'=>$_POST['prenom_new'],'ident'=>$_POST['matricule']));

echo '<br> Nous sommes pas encore disponible.';
$execution->CloseCursor();
}
else{
    echo 'Veuillez renseigner le champs<br>';
}

?>
</form>




</body>
</html>
</body>
    </html>