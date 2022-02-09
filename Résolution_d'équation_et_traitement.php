<?php session_start();

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

/**/
               
    function second_degre($a,$b,$c){

        if($a==0){
            echo 'l\'équation n\'est pas du second dégré</br>';
            $solution=-$c/$b;
        }
        else{
          $delta=pow($b,2)-4*$a*$c;
             if($delta<0){
               $solution= 'Votre équation n\'admet pas de solution';
               echo ($solution);
     
              }
              elseif($delta>0){
                  $solution1=(-$b-sqrt($delta))/2*$a;
                  $solution2=(-$b+sqrt($delta))/2*$a;
                  echo 'Les solutions de l\'equation sont : '.round($solution1,2).' et '.ROUND($solution2,2);
              }
              else{
                  $solution=-$b/2*$a;
                  echo 'Les solutions de l\'equation sont : '.ROUND($solution). ' <br>';
                                  }
        }
      //return $delta;
    }              ?>


    <?php
    function premier_degre($a,$b){
        if($a==0){
            echo 'l\'équation n\'est pas valide ! Veuillez resaisir</br>';
           
        }
        elseif($b==0){
         $solution=0;
                  echo 'La solutions de l\'equation est : '.round($solution,2).' <br> ';
              }
              else{

                 $solution=-$b/$a; 
                  echo 'La solutions de l\'equation est : '.round($solution,2).' <br> ';
                                  }
        }
    
                 ?>

 <form method="post" action="Résolution_d'équation_et_traitement.php" class='form-group'>
     <fieldset>
         <legend>Choix du dégré d'équation</legend>

         <label for="degre">Veuillez choisir le dégré d'équation à résoudre</label>
         <select name="degre" id="degre">
             <option value="1">Dégre 1</option>
             <option value="2">Dégre 2</option>
             </select>
              
              <label for="saisie">Entrée des variables</label>
              <div class="form-group">
              <input type ="text" name="a" placeholder="Premier variable" class="form-control"> x<sup>2</sup> +
              <input type="text" name="b" placeholder="deuxième variable" class="form-control">x +
              <input type="text" placeholder="troisième coefficient" name="c" class="form-control"> <br><br>
        
              </div>
             
         </fieldset>
         <button type="submit" class="btn btn-primary">Valider</button>
        </form>


        
 <?php
 //$val_erreur="False";
  if($_POST['degre']==2 AND $_POST['a']==0){ 
      $val_erreur="True";
            $erreur="Desolé ! l\'équation n\'est pas du second dégré !";
      }
         elseif($_POST['degre']==1 AND $_POST['a']==0){
            $val_erreur="True";
             $erreur="Erreur ! Cette valeur doit etre différent de 0 !";
         }
        elseif((empty($_POST['a']) OR empty($_POST['b']) OR empty($_POST['c'])) AND $_POST['degre']==2){
            $val_erreur="True";
            $erreur="Veuillez renseigner la case ! (elle est laissée vide)!";
      }
        elseif(isset($_POST['c']) AND $_POST['degre']==1){
            $val_erreur="True";
             $erreur="Vous devez saisir au plus deux variables !";
        }
        else{

           $succes="Tout est correct ! Merci pour votre fidélité !"; 
       }
        
?> 
       <?php if($val_erreur) : ?> 
       <div class="alert alert-danger" style="color:red;">
        <?= $erreur ?>
   </div>

   <?php elseif (!$succes): ?>
   <div class="alert alert-success">
            <?= $succes ?>
   </div>
  <?php endif ?>
        <?php 
       switch($_POST['degre']){
           case 1:
            if(isset($_POST['a']) AND isset($_POST['b']) AND $_POST['a']>0){
                premier_degre($_POST['a'],$_POST['b']);
            }
            else{
                echo 'Erreur ! Saisie invalide ! Veuillez reverifier<br>';
            }
            break;
            case 2:
                if(isset($_POST['a']) AND isset($_POST['b']) AND isset($_POST['c']) AND $_POST['a']!=0){
                   
                    second_degre($_POST['a'],$_POST['b'],$_POST['c']) ;
                 }
                 else{
                     echo 'Erreur ! Veuillez vérifier votre saisie<br>';
                 }
                break;
                default :
                echo 'Choix non Valide <br>';
        }
           ?>
           
</body>
</html>