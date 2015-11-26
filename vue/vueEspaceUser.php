<?php 
    $titre='Espace utilisateur';
    ob_start();
?>
<form name="identification" method="POST" action="indexEspaceUser.php">
    <div class='form' >
        <h2>Votre profil</h2>
        <table class='espaceUser'>
            <tr>
                <td>Nom:<br/><br/></td>
                <th><?php $login = $_SESSION['user']; $nom = getNomUser($login); echo implode(array_unique($nom['0']));?><br/><br/></th>
                <td>    
                    modifier nom: <br/><br/></td>
                <th>
                    <input name="nom" type="text" />
                    <br/><br/>
                </th>
                
            </tr>
            <tr>
                <td>Prenom:<br/><br/></td>
                <th><?php $login = $_SESSION['user']; $prenom = getPrenomUser($login); echo implode(array_unique($prenom['0']));?><br/><br/></th>
                <td>modifier prenom: <br/><br/></td>
                <th>
                    <input name="prenom" type="text" />
                    <br/><br/>
                </th>
            </tr>
            <tr>
                <td>Login:<br/><br/></td>
                <th><?php $login = $_SESSION['user']; echo $login; ?><br/><br/></th>
            </tr>
            <tr>
                <td>statut: <br/><br/></td>
                <th><?php $login = $_SESSION['user']; 
                    $statut = getStatutUser($login); 
                    if (implode(array_unique($statut['0']))==0){
                        echo "utilisateur"; 
                    }else{
                        echo "administrateur";
                        
                    }
                    ?><br/><br/></th>
                <td>modifier mot de passe: <br/><br/></td>
                <th>
                    <input name="mdp" id="mdp" type="password" />
                    <br/><br/>
                </th>
            </tr>
            <tr>
                <td></td>
                <th></th>
                <td>confirmer: <br/><br/></td>
                <th>
                    <input name="mdpc" id="mdpc" type="password" />
                    <br/><br/>
                </th>
            </tr>
            <tr>
                <td></td>
                <th></th>
                <th></th>
                <th>
                    <input type="submit" value='Mise à jour du profil' onfocus='verif_mdp();'/>
                    <br/><br/>
                </th>
            </tr>
            <tr>
                <td>
                    Moyenne des notes: <strong><?=$moyenne?></strong>
                    <br/><br/>
                </td>
            </tr>
            <tr>
                <td>
                    <p class='boutons'>
                        <input value='Voir mes notes' type='button' id='bouton'/>
                    </p>
                </td>
            </tr>
        </table>
        <table id="mesNotes"></table>
        <?php
        echo "<input type='hidden' id='user' value='$user'/>";
        ?>
    </div>
</form>
<?php
	$contenu=ob_get_clean();
	require 'gabarit.php';
?>
<script>
    function verif_mdp(){
        var mdp = document.getElementById('mdp');
        var mdpc = document.getElementById('mdpc');
        var valeur1 = mdp.value;
        var valeur2 = mdpc.value;
        if (valeur1 != valeur2){
            alert('Les mots de passes ne sont pas identiques');
        }
    }
  
        var bouton= document.getElementById('bouton');
        var user= document.getElementById('user');
        var affiche_note=document.getElementById('mesNotes');
        var xhr2 = new XMLHttpRequest();
        xhr2.onreadystatechange=function(){ 
        if(xhr2.readyState==4 && xhr2.status==200){
            affiche_note.innerHTML = xhr2.responseText;
            }
        }

        bouton.onclick = function(){
            var user1 = user.value;
            xhr2.open('GET','ajaxNote.php?user1='+user1);
            xhr2.send('user1='+user1);
        }
    
    
</script>