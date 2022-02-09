<!--?php session_start()?-->
<!Doctype html>
<html>
    <head>
<title>Page_connexion</title>
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
    .formblock{
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
 <div class="formblock">
<form action=" " method="POST"> 
     <label for="pseudo"> Pseudonyme ou Identifiant : </label>
       <input type="text" name="pseudo" placeholder="Ex : Jean22"><br><br>
       <label for="password"> Mot de Passe : </label>
       <input type="password" name="pass" placeholder="Mot de passe"><br><br>

       <input type="submit" value="SE CONNECTER">

       <?php
     try{
        $connexion=new PDO("mysql:host=localhost;dbname=gestion_bd_college",'root','');
        $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $connexion->exec("SET NAMES UTF8");
        //echo '<strong>Tout s\'est bien passé</strong>';
     }
     catch(PDOException $e){
        die('Erreur de connexion !'.$e->getMessage());
    }
 
 if(isset($_POST['pass']) AND isset($_POST['pseudo']) 
 AND !empty($_POST['pass']) AND !empty($_POST['pseudo'])){

  $pass_hach=sha1($_POST['pass']);
  $pseudor=$_POST['pseudo'];

  $recuperer=$connexion->prepare("SELECT * FROM membres_connection
  WHERE pseudo=:pseudo AND pass=:passwd");
  $recuperer->execute(array('pseudo'=>$_POST['pseudo'],'passwd'=>$pass_hach));
  


  /*$recuperer=$connexion->query("SELECT * FROM membres_connection
  WHERE pseudo='$pseudor' AND pass='$pass_hach'");*/

 $i=0;
  while($temp=$recuperer->fetch()){
      $id=$temp['id_membre'];
      $pseudo=$temp['pseudo'];
      $i++;
  }
  if($i!=1)
  {
    echo '<br><br>PSEUDO OU MOT DE PASSE INCORRECT';
   
  
} 
else{
    session_start();
    $_SESSION['pseudo']=$pseudo;
    $_SESSION['id_membre']=$id;

   
    header("Location:Ajout_Profil.php");
    echo 'La connexion a aboutit avec succès';

}
$recuperer->closeCursor();

  }
 else{
    echo '<br><br>Renseignez  les champs svp';
    
 }
       
   ?>
      
</form>
       </div>
     </body>
     </html>
     