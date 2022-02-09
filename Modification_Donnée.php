<?php session_start();

?>
<!Doctype html>
<html>
    <head>
        <title> Modification des données</title>
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
a,button{
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

  
<form action="" method="POST">
  
<label for="actuel">Le numéro  de l' Elève dont vous souhaitez modifier le prénom </label>
<input type="text" name="matricule" placeholder="Matricule cible"><br><br>
<label for="nouveau">Le nouveau prénom svp :</label>
<input type="text" name="prenom_new" placeholder="Non actuel"><br><br>
<button class="btn btn-primary">Modifier</button>
</div>

<?php 
try{
    $connexion=new PDO("mysql:host=localhost;dbname=gestion_bd_college",'root','');
    $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_EXCEPTION);
    $connexion->exec("SET NAMES UTF8");
    //echo 'La connexion a bien aboutit </br>';
}
catch(PDOException $e){
    die ('Error ! Une erreur s\'est produite : </br> '. $e->getMessage());
}

if(isset($_POST['matricule']) AND (!empty($_POST['matricule']))){

$modifier=$connexion->prepare('UPDATE eleve SET prenomEtu=:prenom_act WHERE matricule=:ident');
$execution=$modifier->execute(array('prenom_act'=>$_POST['prenom_new'],'ident'=>$_POST['matricule']));
echo '<br>Vous venez de modifier  ce nom qui est désormais '. $_POST['prenom_new'].' Merci !';

$modifier->closeCursor();
}
else{
    echo '<br><br>Veuillez renseigner le champs<br>';
}

?>


</form>


</body>
</html>