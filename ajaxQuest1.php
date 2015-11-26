<?php
	require 'modele/modele.php';
        require 'modele/fonction.php';
	$connexion=getConnexion();
	$num_test=$_GET['num_test1'];

        //chercher les test dans la BDD
        $recup_quest = getRecupQuest1($num_test);
        $max = count($recup_quest);
        if($max!=0){
            echo "<select name='num_quest1' id='num_quest1' style='max-width: 250px;'>";
            for($i=0; $i!=$max;$i++){
                $ligne = $recup_quest[$i];
                echo '<option >';
                echo $ligne['num_quest'],' ',$ligne['libelle_quest'];
            }
            echo"</option></select>";
        }else{
            $libelle_test = noQinTest($num_test);
            $libelle_test= implode($libelle_test[0]);
            echo "<select name='num_quest'>";
            echo "<option value='vide'> - - - Aucune questions pour ".$libelle_test." - - -</option></select>";
        }
        
?>