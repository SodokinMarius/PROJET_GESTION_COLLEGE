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

<header>
<!--?php include_once("Animation_text.php");?-->
</header>


<nav>
    <ul class="menu_horizontal">
        <li><a href="Accueil.php">ACCUEIL</a></li>
        <li><a href="#">HISTORIQUE</a></li>
        <li><a href="#">COLLEGE</a></li>
        <li><a href="#">LYCEE</a></li>
        <li  class="menu_admin"> <a href="#">ADMINISTRATION</a>
                <ul class="sous_menu">
                    <li><a href="#">CENSORAT</a></li>
                    <li><a href="#">SURVEILLANCE</a></li>
                    <li> <a href="#">DIRECTION OU PROVISORAT</a></li>
                    <li><a href="#">COMPTABILITE</a><li>
                    <li><a href="#">SECRETARIAT</a><li>
                </ul>
</li>
     <li class="menu_compte"> <a href="#">MON COMPTE</a>
 <ul class="sous_menu">
        <li><a href="Deconnexion.php">DECONNEXION</a></li>
        <li> <a href="#">SE CONNECTER A UN AUTRE COMPTE</a><li>
</ul>
</li>
        <li  class="menu_inscript"><a href="#">INSCRITION</a>
            <ul class="sous_menu">
                <li><a href="Incription_Etudiant.php">Formulaire d'enregistrement</a></li>
                <li><a href="Criteres_inscription.php">Critères d'Inscription</a><li>
                <li><a href="Specialites_Series.php">Spécialités/Séries<a></li>
                <li><a href="Cout_Inscription.php">Frais d'Inscription et de Formation</a><li>
            </ul>
        </li>

        <li class="menu_resultat"><a href="#">RESULTATS</a>
            <ul class="sous_menu">
                <li><a href="Bilan_2021.php">2020-2021</a></li>
                <li><a href="Bilan_2020.php">2019-2020</a><li>
            </ul>
        </li>
    </ul>
</nav>



 


     <footer>
        </div class="pied"> Rentrées Scolaires 2021-2022 
        </div>
        
     </footer>
</body>
</html>
