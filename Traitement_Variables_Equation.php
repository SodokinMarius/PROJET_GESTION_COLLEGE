
 
<?php     
function solution_equation($_POST['a'],$_POST['b']){

   
                       if(isset($_POST['a']) AND isset($_POST['b']) AND isset($_POST['c']) AND $_POST['a']!=0 ){
               
                        if($_POST['a']==0){
                            echo 'l\'équation n\'est pas du second dégré</br>';
                            $solution=-$_POST['b']/2*$_POST['a'];
                        }
                        else{
                          $delta=pow($_POST['b'],2)-4*$_POST['a']*$_POST['c'];
                             if($resultat<0){
                               $solution= 'Votre équation n\'admet pas de solution';
          
                              }
                              elseif($resultat>0){
                                  $solution1=(-$_POST['b']-sqrt($resultat))/2*$_POST['a'];
                                  $solution2=(-$_POST['b']+sqrt($resultat))/2*$_POST['a'];
                              }
                              else{
                                  $solution=-$_POST['b']/2*$_POST['a'];                        }
                        }
                    
                    echo 'Les solutions de l\'equation sont : '.$solution1.' et '.$solution2;
                       }
    ?>
    }   
