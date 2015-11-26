<?php
	require 'modele/modele.php';
        require 'modele/fonction.php';
	$connexion=getConnexion();
	$num_cat2=$_GET['num_cat2'];
	//charger la liste des employes avec le premier service
        $affiche_quest= getAfficheQuest($num_cat2);
        $max=count($affiche_quest);
        if ($max != 0){
            echo "<select name='num_quest1' id='num_quest1' style='max-width: 250px;' >";
            echo "<option value=''> - - - Choisissez une question - - -</option></select>";
            for($i=0;$i!=$max;$i++){
                $ligne = $affiche_quest[$i];
                echo "<option value='".$ligne['num_quest']."'>";
                echo $ligne['num_quest'],' ',$ligne['libelle_quest'];
            }
            echo "</option></select>";
        } else {
            $libelle_cat = noQTInCat($num_cat2);
            $libelle_cat = implode($libelle_cat[0]);
            echo "<select name='num_quest1'>";
            echo "<option value='vide'> - - - Aucune questions pour ".$libelle_cat." - - -</option></select>";
        }        
?>