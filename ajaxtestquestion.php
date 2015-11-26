<?php
	require 'modele/modele.php';
        require 'modele/fonction.php';
	$connexion=getConnexion();
	$num_cat=$_GET['num_cat'];

        //chercher les test dans la BDD
        $recup_test = getRecupTest($num_cat);
        $max = count($recup_test);
        if($max!=0){
            echo "<select name='num_test' id='num_test' style='max-width: 250px;'>";
            echo "<option>- - - Choisissez le test - - -</option>";
            for($i=0; $i!=$max;$i++){
                $ligne = $recup_test[$i];
                if($ligne['difficulte']==1){
                    $diff='facile';
                }else{
                    if($ligne['difficulte']==2){
                        $diff='moyen';
                    } else {
                        $diff='difficile';
                    }
                }
                echo '<option >';
                echo $ligne['num_test'],' ',$ligne['libelle_test'],' ',$diff;
            }
            echo"</option></select>";
        }else{
            $libelle_cat = noTinCat($nom_cat);
            $libelle_cat = implode($libelle_cat[0]);
            echo "<select name='num_quest'>";
            echo "<option value='vide'> - - - Aucun test pour ".$libelle_cat." - - -</option></select>";
        }
        
?>
