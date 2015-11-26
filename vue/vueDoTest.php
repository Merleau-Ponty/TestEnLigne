<?php 
    $titre="Effectuer un test";
    ob_start();
?>
    <!-- Formulaire d'ajout de catégorie -->
    <?php
        $num_test= intval($_POST['num_test']);
        $affiche_test = getAfficheQT($num_test);
        $recup_numQ = getRecupNumQ($num_test);
        $recup_selec = getRecupSelect($num_test);
        $max=count($affiche_test);
        $nb_rep = 0;
        $test= 0;
        echo "<form name='form' method='post' action='indexFinishTest.php'>"  ;
        $cpt1 = 0;
            for($i=0;$i!=$max;$i++){
                $tmp = 0;
                echo "<div class='formTest' >
                        <table>
                            <tr>
                                <th class='numQuest'>";
                                    $nb = $i +1;
                                    echo "<h3>Question $nb</h3>";
                                echo "</th>";
                                echo "<th>";                                
                                    $libelle_quest = implode($affiche_test[$i]);
                                    echo "<span>$libelle_quest</span>";
                                    $numQ = $recup_numQ[$i]['num_quest'];
                                    $affiche_rep = getAfficheLesRep($numQ);
                                    $cpt=count($affiche_rep);
                                    $nb_rep = $nb_rep + $cpt;
                                    for($ii=0; $ii!=$cpt; $ii++){
                                        $affiche_larep = $affiche_rep[$ii]['libelle_rep'];
                                        $affiche_numLaRep = $affiche_rep[$ii]['num_rep'];
                                        $id_larep = addslashes($affiche_larep);
                                        $selec = $recup_selec[$i]['type_selec'];
                                        echo "<br/><br/>";
                                        if($selec == 0){
                                            if ($tmp == $ii){
                                                $cpt1 = $cpt1 + 1;
                                            }
                                            $t = $cpt1 - 1;
                                            echo "<label for='$id_larep'><input type='radio' id='$id_larep' name='radio$t' value='$affiche_numLaRep.$affiche_larep' >$affiche_larep</label>";
                                        }else{    
                                            echo "<label for='$id_larep'><input type='checkbox' id='$id_larep' name='checkbox[]' value='$affiche_numLaRep.$affiche_larep' >$affiche_larep</label>";
                                        }
                                    }
                                echo "<br/><br/>
                                </th>
                            </tr>
                        </table> 
                    </div>";
                    echo "<input type='hidden' id='cpt1' name='cpt1' value='$cpt1'/>
                          <input type='hidden' id='num_cat' name='num_cat' value='$numQ'/>";
                    for ($a=0; $a!=$cpt; $a++){
                        if($i==0){
                            $recup_numRep[$a] = $affiche_rep[$a]['num_rep'];
                            echo "<input type='hidden' id='nums_rep$a' name='nums_rep$a' value='$recup_numRep[$a]'/>";
                        } else {
                            $recup_numRep[$test1] = $affiche_rep[$a]['num_rep'];
                            echo "<input type='hidden' id='nums_rep$test1' name='nums_rep$test1' value='$recup_numRep[$test1]'/>";
                            $test1++;
                        }
                    }
                    $test = $test + $cpt;
                    $test1= $test;
            }
            echo "<input type='hidden' id='nb_rep' name='nb_rep' value='$nb_rep'/>";
            echo "<p class='boutons'>
                    <input value='Enregistrer' type='submit'/>
                    <input value='Annuler' type='reset'/>
                </p>
            </form>";
        $contenu=ob_get_clean();
        require 'gabarit.php';
?>