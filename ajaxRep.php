<?php
	require 'modele/modele.php';
        require 'modele/fonction.php';
	$connexion=getConnexion();
	$num_quest2=$_GET['num_quest2'];
	//charger la liste des employes avec le premier service
        $affiche_rep= getAfficheRep($num_quest2);
        $max=count($affiche_rep);
        if ($max != 0){
            echo "<select name='num_rep1' size='4'>";
            for($i=0;$i!=$max;$i++){
                $ligne = $affiche_rep[$i];
                echo "<option>";
                echo $ligne['libelle_rep'];
            }
            echo "</option></select>";
        } else {
            $libelle_quest = noRepForQuest($num_quest2);
            $libelle_quest = implode($libelle_quest[0]);
            echo "<select name='num_rep1'>";
            echo "<option value='vide'> - - - Aucune réponses pour cette question - - -</option></select>";
        }        
?>