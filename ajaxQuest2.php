<?php
	require 'modele/modele.php';
        require 'modele/fonction.php';
	//$connexion=getConnexion();
	$num_cat=$_GET['num_cat'];

        //chercher les test dans la BDD
        $recup_quest = getRecupQuest($num_cat);
        $max = count($recup_quest);
        $ii=0;
        if($max!=0){
            echo "<select name='num_TQuest$ii' id='num_TQuest$ii' style='max-width: 250px;'>";
            echo "<option>- - - Choisissez la question - - -</option>";
            for($i=0; $i!=$max;$i++){
                $ligne = $recup_quest[$i];
                echo '<option >';
                echo $ligne['num_quest'],' ',$ligne['libelle_quest'];
            }                       
        }else{
            $libelle_cat = noQinCat($num_cat);
            $libelle_cat = implode($libelle_cat[0]);
            echo "<select name='num_quest'>";
            echo "<option value='vide'> - - - Aucune questions pour ".$libelle_cat." - - -</option></select>";
        }
        
        
        
?>
