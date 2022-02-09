<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>

    <style>
    body{
       /*background-color:purple;*/
      
    }
    label:{
    font-size:1.5rem;
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
    font-size:1rem;
    border-radius:10 %;
    
    }
    label{
       
    }
    a,input[type="submit"]{
        text-decoration:none;
        color:white;
        font-family:arial;
        font-weight:bold;
        width:70px;
        height: 20px;
        box-shadow :5px 5px ;
        background-color:black;
        margin-left:20%;
    }   
     </style>
</head>
<body>
    <!--Connexion à la base de données--->
    <?php 
    try{

    $connexion=new PDO("mysql: host=localhost;dbname=gestion_bd_college",'root','');
    $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $connexion->exec("SET NAMES UTF8");
    echo 'Connexion etablie';
    }
    catch(PDOException $e){
            die('Connexion echoué ! '.$e->getMessage());
    }
    ?>
   
   <form action="Accueil.php" method="POST"  enctype="multipart/form-data">
    
       <label for="photo">
           M/ Mme<strong> <?php
               echo htmlspecialchars($_SESSION['pseudo']) ;?> </strong>Nous souhaitons vous connaitre de visage. <br>
       
       Cliquez pour ajouter votre photo de Profil : </label>
       <input type="file" name="photo" placeholder="Choisissez votre image"><br><br>
       <input type="submit" value="AJOUTER">
</form><br><br>

<!-------------------Traitement de l'image------------------>
<?php 
if(isset($_FILES['photo']) AND $_FILES['photo']['error']==0){
    if($_FILES['photo']['size']<=1000000){
        $nomphoto=$_FILES['photo']['name'];
        $infosphoto=pathinfo($_FILES['photo']['name']);
        $typePhoto=$infosphoto['extension'];

        //Liste possible des extensions valables
        $types_valables=array("gif","jpeg","jpg","png");

        //Controle de l'extension de l'image
        if(in_array($typePhoto,$types_valables)){

            //Acceptons definitivement la photo
            move_uploaded_file($_FILES['photo']['tmp_name'],'uploads'.basename($nomphoto));
            echo 'Photo importée avec succès<br>';

        }
        else{
            echo 'Extension invalide';
        }
    }
}

?>

</body>
</html>