<?php 
    $titre="Résultat du Test";
    ob_start();
?>
    <!-- Formulaire d'ajout de catégorie -->
    <form name='form' method='post' action='indexChoixTest.php'>
        <div class='formTest' >
            <h2>Votre résultat</h2>
            <?php
                         
                //Regarde sur combien est noté le test
                $notation = count($notation)*2;
                //Calcul la note -> +1 par réponses justes et - 0.5 par réponses fausses
                $note2 = (count($note1) + count($note) - (count($notef)/2) - (count($notef1)/2))*2;
                $notefinale = round(($note2/$notation)*20);
                echo "<h4>Votre note: $notefinale/20</h4>";
                
                getSaveNote($notefinale);
                $max_cor1 = count($cor1);
                $max_cor2 = count($cor2);
                echo"<div style='display: inline-block; vertical-align: top; margin-left: 10px;'>";
                if($max_cor1 != null || $max_cor2 != null){
                    echo"<h4>Vos bonnes réponses :</h4>";
                    for($i=0;$i!=$max_cor1;$i++){
                        $max1 = count($cor1[$i]);
                        for($ii=0;$ii!=$max1;$ii++){
                            $show = implode($cor1[$i][$ii]);
                            echo "<span style='color: green; font-weight: bold;'>$show</span></br>";
                        }
                    }

                    for($i=0;$i!=$max_cor2;$i++){
                        $max1 = count($cor2[$i]);
                        for($ii=0;$ii!=$max1;$ii++){
                        $show = implode($cor2[$i][$ii]);
                            echo "<span style='color: green; font-weight: bold;'>$show</span></br>";
                        }
                    }
                }
                echo"</div>";
                
                $max_incor1 = count($incor1);
                $max_incor2 = count($incor2);
                echo"<div style='display: inline-block; vertical-align: top; margin-left: 30px;'>";
                if($max_incor1 != null || $max_incor2 != null){
                    echo"<h4>Vos mauvaises réponses :</h4>";
                    for($i=0;$i!=$max_incor1;$i++){
                        $max1 = count($incor1[$i]);
                        for($ii=0;$ii!=$max1;$ii++){
                        $show = implode($incor1[$i][$ii]);
                            echo "<span style='color: red; font-weight: bold;'>$show</span></br>";
                        }
                    }

                    for($i=0;$i!=$max_incor2;$i++){
                        $max1 = count($incor2[$i]);
                        for($ii=0;$ii!=$max1;$ii++){
                        $show = implode($incor2[$i][$ii]);
                            echo "<span style='color: red; font-weight: bold;'>$show</span></br>";
                        }
                    }
                }
                echo"</div>";
            ?>
            <p class='boutons'>
                <input value='Retour aux choix du test' type='submit'/>
            </p>
            </form> 
        </div>
    </form>                
<?php
    $contenu=ob_get_clean();
    require 'gabarit.php';
?>