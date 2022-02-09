<?php session_start(); ?>
<!Doctype html >
<html>
<head>
<title>Inscription des éleves</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8" />
<link rel="stylesheet" href="styles/Projet_forme.css">

<style>
    body{
        background-color: lightgreen;
        
    }
    form{
    
    height: 800px;
    background-color:grey;
    border: 2px groove red;
box-shadow:30px 10px 5px blue ;

color:white;
padding:5%;
border-radius:10%;
}

a,input[type="submit"],input[type="reset"]{
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
input::hover{
    border: 10px solid red;
    color:pink;
    font-size:2rem;
}
.titre,label,legend{
    width:40%;
    height:6%;
    background-color:blue;
    font-family:arial;
    font-weight:bold;
}
label{
    background-color:white;
    color:black;
    margin-left:5px;
    margin-right:10px;
}
     </style>
 </head>
 <header></header>
 <nav></nav>
 <article> 
 <div class="titre">
        <div class="navpar navpar-tixea-top" role="navigation">
    <div class="container">
    
    <div class="navbar-header">
        <a href="#" class="navbar-brand">
        FORMULAIRE D'INSCRIPTION
        </a>
    
    </div>
    </div>
    
</div><br><br>
 <div class="container">
     <div class="starter-container">

    
    <form method="POST" action="Traitement_Incription.php">
    
   
     <fieldset>
         <legend>INFORMATIONS PERSONNELS</legend>
      
         <div class="form-group">
         <label for="matricule" id="matricule">Numéro matricule :                </label>
        <input type="text" name="matricule" class="form-control" placeholder="Ex : E00045"><br><br>

   
        <label for="nom" id="nom">NOM: </label>
<input type="text" name="nomEtu"  class="form-control"  placeholder="Saisir votre nom" size="20" ><br><br>
   
        <label for="prenom" id="prenom">PRENOM(s):</label>
        <input type="text" name="prenomEtu"  class="form-control" placeholder="Votre(vos) Prenom(s)" size="40" ><br><br>

        <label for="daten" id="daten">DATE DE NAISSANCE: </label>
        <input type="date" name="dateNaissance"  class="form-control"  size="20" ><br><br>

        <label for="lieu" id="">LIEU DE NAISSANCE: </label>
        <input type="text" name="LieuNaissance"  class="form-control"  placeholder="Lieu de naissance" size="25" ><br><br>

        <label for="sexe" id="sexe">SEXE: </label>
        <select name="sexe">
            <option value="1">Masculin</option>
            <option value="2">Feminin</option>
        </select><br><br>

        <label for="age" id="age">AGE :</label>
        <input type="number" name="age"  class="form-control"  placeholder="age" class="form-control"><br><br>
        

        <label for="tele">CONTACTS</label>
        <input type="text" name="telephone"  class="form-control" placeholder="Numéro de telephone" class="form-control"><br><br>

        <label for="mail">ADRESSE MAIL : </label>
        <input type="email" name="Admail"  class="form-control" placeholder="Ex: education@gmail.com"><br><br>
        <div>
            
    </fieldset><br><br>
     <fieldset>
         <legend>ADRESSE</legend>
        <div class="form-group">
            <div class="row">
                <div class="col-xs-6">

         <label for="pays" id="pays">PAYS :</label>
         <input type="text" name="pays"  id="pays" class="form-control"  placeholder="Pays d'origine"><br><br>

            <label for="depart" id="depart">DEPARTEMENT : </label>
            <input type="text" name="departement"  id="depart" class="form-control" placeholder="Departement"><br><br>

            <label for="commune" id="commune">COMMUNE : </label>
            <input type="text" name="commune" id="commune"  class="form-control"  placeholder="Commune"><br><br>

            <label for="arrondissemnt" id="arrondissemnt">ARRONDISSEMNT :</label>
            <input type="text" name="arrondissement" id="arrondissement" class="form-control" placeholder="arrondissement"><br><br>

            <label for="quartier" id="quartier">QUARTIER : </label>
            <input type="text" name="quartier" id="quartier" class="form-control" placeholder="quartier"><br><br>

            <label for="rue" id="rue">RUE :</label>
            <input type="text" name="rue" id="rue" class="form-control"  placeholder="rue"><br><br>
         </fieldset>
         </div>
            </div>
         <fieldset>
    
         <legend>INSCRIPTION</legend>
        
        <button type="submit" class="btn-btn-primary">S'Inscrire</button>
        <button type="reset" class="btn-btn-primary"> Annuler</button>
        
         </div>
     </fieldset>
     </form>
</div>

     </div>
 </div>

    
 </article>
 
 <!--?php
 
  include_once("Traitement_Incription.php"); ?-->
 
     <footer></footer>
 <body>
</body>
</html>