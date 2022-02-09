
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>

    <style>
    body{
        background-color: lightgreen;
       
    }
    form{
    
    height: 300px;
    background-color:grey;
    border: 2px groove red;
box-shadow:30px 10px 5px blue ;
margin-top:15%;
margin-left:20%;
margin-right:20%;
color:white;
padding:10%;
border-radius :10%;
}

a,input[type="submit"]{
    text-decoration:none;
    color:white;
    font-family:arial;
    font-weight:bold;
    width:100px;
    height: 20px;
    box-shadow :5px 5px ;
    background-color:black;
    margin-left:20%;
  
} 
p{background-color:white;font-family:arial;
    font-weight:bold;}  
     </style>
</head>
<body>
    <!--Connexion à la base de données--->
    <?php 
    try{

    $connexion=new PDO("mysql: host=localhost;dbname=gestion_bd_college",'root','');
    $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $connexion->exec("SET NAMES UTF8");
   // echo 'Connexion etablie';
    }
    catch(PDOException $e){
            die('Connexion echoué ! '.$e->getMessage());
    }
    ?>
   <form  method="POST">
       <label for="pseudo"> Pseudonyme souhaité ou Identifiant : </label>
       <input type="text" name="pseudo" placeholder="Ex : Jean22"><br><br>
       <label for="password"> Mot de Passe : </label>
       <input type="password" name="pass" placeholder="Mot de passe" maxlenght="20" minlenght="8"><br><br>
       <label for="pass_confirm"> Confirmation du mot de Passe  : </label>
       <input type="password" name="pass_confirm" placeholder="Retapez svp"  maxlenght="20" minlenght="8"><br><br>
       <label for="mail">Adresse Email : </label>
       <input type="email" name="Admail" placeholder="sodyam@gmail.com"><br><br><br><br>
    
       
       <input type="submit" value="S'inscire"><br><br><br>
       <a href="Page_connexion.php"> SE CONNECTER</a><br><br>
</form><br><br>
<p>
<!--Traitement du Formulaire--->
<?php 

//Contrôle des entrées
if(isset($_POST['pseudo']) AND isset($_POST['pass']) AND isset($_POST['pass_confirm'])
AND isset($_POST['Admail']) ){

    //Recupération des Pseudo de la Base de données
    $recuperation_Pseudo=$connexion->query("SELECT pseudo FROM membres_connection");
    
    $PseudoExiste="False";
    //Verification de l'existence du Pseudo à inscrire dans la BD
       while($pseudo_temp=$recuperation_Pseudo->fetch()){
        if($pseudo_temp['pseudo']==$_POST['pseudo']){
           $PseudoExiste="True";
        }
    }
    $extention='extension';
    $mail_valables=array("com","fr");
        $mailinfos=pathinfo($_POST['Admail']);
    $domaineMail=$mailinfos[$extention];
   
    //Controles profonds sur les valeures
    if( $_POST['pass']==$_POST['pass_confirm'] AND ($PseudoExiste=="False")){

        //Verification de la validité du mail
        if(in_array($domaineMail,$mail_valables)){
            
         echo 'Vos informations sont bien enregistées.';
        
        $passwd_hach=sha1($_POST['pass']);
        
        $insertion=$connexion->prepare("INSERT INTO membres_connection(pseudo,pass,Admail,date_inscription)
        VALUES(?,?,?,CURTIME())");

        $executer=$insertion->execute(array($_POST['pseudo'],
        $passwd_hach,$_POST['Admail']));
        $insertion->CloseCursor();
    }
   /* else{
        echo 'Domaine de l\'adresse mail inconnu<br>';
    } */ 
    }
    else{
        echo 'Mots de passe ne sont pas identiques ou Pseudo déjà existant.<br>';
    }
    
}
else{
    echo 'Un ou plusieurs champs sont mal ou non renseignés<br>';
    //header("Location:Page_Inscription.php");
}

?>
</p>

    
</body>
</html>