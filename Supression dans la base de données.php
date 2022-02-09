<?php session_start();

?>
<!Doctype html>
<html>
    <head>
        <title>Suppresion et Modification des données</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initiale-scale=1">
        <link rel="stylesheet" href="styles/Forme_Equation.css">

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

  
<form action="Supression dans la base de données.php" method="POST">
    <div class="form-group">
    <label for="matricule" >Veuillez saisir le matricule de l'Elève à rétirer de la base :</label>
    <div class="form-group">
    <input type="text" name="matricule" placeholder="Ex: E200001" class="control-form">

</div> 

<button class="btn btn-primary">Supprimer</button>

</div>

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


$nom=$execution['nomEtu'];
$prenom=$execution['prenomEtu'];
$datenaiss=$execution['dateNaissance'];
$matricule=$execution['matricule'];


$suppr=$connexion->prepare('DELETE FROM eleve WHERE matricule=?');

$request=$suppr->execute(array($_POST['matricule']));

echo 'L\'apprenant'. $nom. ' '.$prenom.
' né (é) le'.$datenaiss.'et de Matricule '.$matricule. ' a rétirer avec succès<br>';
 




/*$reduction=$connexion->prepare('SELECT nomEtu,prenomEtu,age,
CASE age
WHEN 20 THEN "Tres bien,Vous pouvez beneficier"
ELSE "Merci de vous patientier pour des années à venir"
END  
AS mention
FROM eleve
WHERE matricule LIKE ?' );
$reduction->execute(array($_POST['matricule']));*/
$suppr->CloseCursor();
}
else{
    echo 'Veuillez renseigner le champs<br>';
}

?>
</form>




</body>
</html>