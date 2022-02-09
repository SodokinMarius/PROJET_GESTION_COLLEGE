<<?php session_start();

?>
<!Doctype html>
<html>
    <head>
        <title>Résolution d'équations</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initiale-scale=1">
        <link rel="stylesheet" href="styles/Forme_Equation.css">
</head>
<body>
    <?php
    $tabl=array(
        '01'=>'Yao Marius SODOKIN',
        '02'=>'ESSOUN Romain',
        '03'=>'SOSSA Romuald',
    '04'=> 'Nanouchi Voandzou');

    //Methode d'Affichage 1
        echo '<pre>';
        print_r($tabl);
        echo '</pre>';

        //2 eme Methodes
        foreach($tabl as $cle => $contenu){
            echo $cle .'--------------'.$contenu.' <br>';
        }

        //3e methode:
       /* for($indice=0;$indice<4;$indice++)
        {
           echo $tabl[$indice];
        }
        //4me methode 
        while($donne=$tabl->fetch()){
            echo $donne;
        }*/
   if(array_key_exists('01',$tabl)){
       echo '<strong>La clé exite dans le tableau</strong><br>';
   }
   echo ' L\'element  a pour clé '.in_array('SOSSA Romuald',$tabl);
   echo '<br> L\'element  a pour clé '.array_search('SOSSA Romuald',$tabl);
  
    ?> 
    <form action="Tableaux_et_Revisions.php" method="POST" enctype="multipart/form-data">
    <label>Cliquer pour importer le fichier :</label>
    <input type="file" placeholder="cliquer pour improter" name="monfile">
    <input type="submit" value="Valider"/>
</form>
<?php
if(isset($_FILES['monfile']) AND $_FILES['monfile']['size']<=10000 AND  $_FILES['monfile']['error']==0){
 $nom=$_FILES['monfile']['name'];
$type=$_FILES['monfile']['type'];
$temp_name=$_FILES['monfile']['tmp_name'];
$taille=$_FILES['monfile']['size'];
$erreur=$_FILES['monfile']['error'];
echo '<table border="2">';
echo '<tr><th>Nom</th><th>Type ou extension</th><th>Nom temporaire</th>
    <th>Taille</th><th>Erreur</th></tr>';
echo '<tr><th> '.$nom.' </th><th> '.$type.' </th><th> '.$temp_name.' </th>
    <th> '.$taille.' </th><th> '.$erreur.' </th></tr>';
    echo '</table>';

}else{
    echo '<br>Maise information rensignée';
}

?>
</body>
</html>