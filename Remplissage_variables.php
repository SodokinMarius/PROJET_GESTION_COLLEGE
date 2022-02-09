<?php session_start();

?>
<! Doctype html>
<html>
    <head>
        <title>Résolution d'équations</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initiale-scale=1">
</head>
<body>
 <form method="post" action="Résolution_d'équation_et_traitement.php">
     <fieldset>
         <legend>Choix du dégré d'équation</legend>
         <label for="degre">Veuillez choisir le dégré d'équation à résoudre</label>
         <select name="degre" id="degre">
             <option value="1">Dégre 1</option>
             <option value="2">Dégre 2</option>
             </select>
         </fieldset>
</form>

  <?php
  switch ($_POST['degre']) {
      case '1':
        echo '<form method="post" action="Résolution_d\'équation_et_traitement.php"><br>';
        echo 'fieldset <br> <legend> Entréé des données<br></legend>';
        echo 'label>Variables : </label>';
            echo '<input type="text" name="a" placeholder="Prémière variable"> x + ';
            echo '<input type="text" name="b" placeholder="Deuxième variable"> =  ';
            vv
            
    echo '<input type="text" value="' . $x . '"> <br> ';
    
        echo 'fieldset <br>';
        echo '</form>';
        
        case '2':
            echo 'n';
            break;
            default:
            echo 'Erreur de choix ! Veuillez reesayez ! </br>'
        } 
   ?>
   
</body>
</html>