<?php 

    
        session_start();
        session_regenerate_id();
    
?>
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
    p{
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

     </style>
</head>
<body>
    <!--Connexion à la base de données--->
   
    <?php 
    echo '<p>';
     $_SESSION=array();
     session_unset();
     session_destroy();
     session_write_close();
     setcookie('PSEUDO',''); 
     echo $_COOKIE['pseudo']. 'a été bien deconnecté'; 
     echo ' </p>';
    ?>
    
</body>
</html>