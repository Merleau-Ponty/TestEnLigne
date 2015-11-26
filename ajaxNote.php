<?php
	require 'modele/modele.php';
        require 'modele/fonction.php';
	$id_user=$_GET['user1'];
	//charger la liste des employes avec le premier service
        $affiche_note= getAfficheNote($id_user);
        $max=count($affiche_note);
        if ($max != 0){
            echo "<tr>
                    <th>Nom du test</th>
                    <th> Note</th>";
            for($i=0;$i!=$max;$i++){
                echo "<tr>
                        <td>";
                            $ligne = $affiche_note[$i];
                            echo $ligne['libelle_test'];
                        echo "</td>
                        <td>";
                            $ligne = $affiche_note[$i];
                            echo $ligne['note'];
                        echo"</td>
                </tr>";
            }
        } else {
            echo "<tr><td>Vous n'avez aucune note</td></tr>";
        }        
?>