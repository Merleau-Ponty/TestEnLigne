<?php 
    $titre="Modification des droits d'administration";
    ob_start();
?>
    <!-- Formulaire d'ajout de catégorie -->
    <form name='form' method='post' action='indexDroit.php'>
        <div  class='form' >
            <h2>Modifier les droits</h2>
            <table class='setDroit'>
                <tr>
                    <th>
                        <label for='nom_user'>Choisissez l'utilisateur :</label>
                        <br /><br />
                    </th>
                    <td>
                        <?php
                            $affiche_user=  getAfficheUser();
                            $max=count($affiche_user);
                            echo "<select name='num_user'>";
                            for($i=0;$i!=$max;$i++){
                                $ligne = $affiche_user[$i];
                                echo "<option >";
                            echo $ligne['num_user'],' ',$ligne['nom_user'],' ',$ligne['prenom_user'];
                            }
                            echo "</option></select>";
                        ?>
                        <br /><br />
                    </td>
                    <td>
                        <label><input name='admin' type='radio' value='1' onblur='validation_promo();' checked/>Administrateur</label>
                        <br /><br />
                    </td>
                    <td>
                        <label><input name='admin' type='radio' value='0' onblur='validation_promo();' />Simple utilisateur</label>
                        <br /><br />
                    </td>
                </tr>
            </table>
            <!--Envoi et annulation-->
            <p class='boutons'>
                <input value='Valider' type='submit' onclick='trait_form();'/>
            </p>
        </div>
    </form> 
<?php
    $contenu=ob_get_clean();
    require 'gabarit.php';
?>