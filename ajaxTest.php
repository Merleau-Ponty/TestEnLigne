<?php
	require 'modele/modele.php';
        require 'modele/fonction.php';
	$connexion=getConnexion();
	$num_cat2=$_GET['num_cat2'];
	//charger la liste des employes avec le premier service
        $affiche_test= getAfficheChoixTest($num_cat2);
        $max=count($affiche_test);
        if ($max != 0){
            echo "<select name='num_test' id='num_test' style='width: 250px;' >";
            echo "<option value=''> - - - Choisissez un test - - -</option></select>";
            for($i=0;$i!=$max;$i++){
                $ligne = $affiche_test[$i];
                echo "<option value='".$ligne['num_test']."'>";
                echo $ligne['num_test'],' ',$ligne['libelle_test'];
            }
            echo "</option></select>";
        } else {
            $libelle_cat = noQTInCat($num_cat2);
            $libelle_cat = implode($libelle_cat[0]);
            echo "<select name='num_test'>";
            echo "<option value='vide'> - - - Aucun test pour ".$libelle_cat." - - -</option></select>";
        }        
?>