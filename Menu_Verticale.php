<!--?php

    session_start();
$Ouvresession=$_SESSION['pseudo'];
setcookie('PSEUDO',$Ouvresession,time()+365*24*60*60,null,null,False,true);
?-->

<!Doctype html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initiale-scale=1">
        <link rel="stylesheet" href="styles/Forme_accueil.css">
</head>
<body>  



<div>
<div class="corps">
    
        <ul>
            <li><a href="Supression dans la base de données.php">Supprimer le Compte</a></li>
            <li><a href="Consultation_info.php">Consultation des résultats</a></li>
            <li><a href="Modification_Donnée">Modifier une Information</a></li>
            <li><a href="#">Contactez nous</a></li>
        </ul>
        </div>


   
</div>
 


     <footer>
        </div class="pied"> Rentrées Scolaires 2021-2022 
        </div>
        
     </footer>

</body>
</html>
