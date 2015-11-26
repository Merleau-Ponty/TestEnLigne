<?php 
    $titre='Inscription';
    ob_start();
?>
<form name="identification" method="POST" action="indexIns.php">
    <div class='form' >
        <h2>Inscrivez-vous</h2>
        <table>
            <tr>
                <th>
                    <label>Nom  </label> <input maxlength='32' name="nom" id='nom' type="text" />
                    <br/><br/>
                </th>
                <th>
                    <label>Prénom  </label> <input maxlength='32' name="prenom" id='prenom' type="text" />
                    <br/><br/>
                </th>
            </tr>
            <tr>
                <th>
                    <label>Login  </label> <input maxlength='6' name="login" id='login' type="text" />
                    <br/><br/>
                </th>
                <th>
                    <label>Mot de passe  </label> <input maxlength='15' name="mdp" id='mdp' type="password" />
                    <br/><br/>
                </th>
            </tr>
            <tr>
                <th>
                </th>
                <th>
                    <label>Confirmation  </label> <input maxlength='15' name="mdpc" id='mdpc' type="password" />
                    <br/><br/>
                    <span class='tooltip1' id='tooltipLib'>La Catégorie a bien été enregistrée</span>
                </th>
            </tr>
            <tr>
                <th>
                    <input type="submit" value='Inscription' onfocus='trait_form();'/>
                    <br/><br/>
                </th>
            </tr>
            <tr>
                <tr>
                <th></th>
                <th>
                    <a href='index.php'><div class='logo_co'><!--Logo inscription--></div><div class='insc-co'>Formulaire de connexion</div></a>
                </th>
            </tr>
            </tr>
        </table>
        <h2><?=$message?></h2>
    </div>
</form>
<script>
    function trait_form(){
        var nom = document.getElementById('nom');
        var prenom = document.getElementById('prenom');
        var login = document.getElementById('login');
        var mdp = document.getElementById('mdp');
        var mdpc = document.getElementById('mdpc');
        var valNom= nom.value;
        var valPrenom= prenom.value;
        var valLogin= login.value;
        var valMdp= mdp.value;
        var valMdpc= mdpc.value;
        if (valNom =="" || valPrenom =="" || valLogin =="" || valMdp =="" || valMdpc ==""){
           alert('Il y a des champs vides');
        } else {
            verif_mdp();
        }
    }
        
    function verif_mdp(){
        var mdp = document.getElementById('mdp');
        var mdpc = document.getElementById('mdpc');
        var valeur1 = mdp.value;
        var valeur2 = mdpc.value;
        if (valeur1 != valeur2){
            alert('Les mots de passes ne sont pas identiques');
        }
    }
        
</script>
<?php
	$contenu=ob_get_clean();
	require 'gabarit.php';
?>