<?php 
    $titre='Connexion';
    ob_start();
?>
<form name="identification" method="POST" action="index.php">
    <div class='form' >
        <h2>Connectez-vous</h2>
        <table>
            <tr>
                <th>
                    <label>Login  </label> <input name="login" type="text" />
                    <br/><br/>
                </th>
                <th>
                    <label>Mot de passe  </label> <input name="mdp" type="password" />
                    <br/><br/>
                </th>
            </tr>
            <tr>
                <th>
                    <input type="submit" value='Connexion' />
                    <br/><br/>
                </th>
            </tr>
            <tr>
                <th></th>
                <th>
                    <a href='indexIns.php'><div class='logo_insc'><!--Logo inscription--></div><div class='insc-co'>Formulaire d'inscription</div></a>
                </th>
            </tr>
        </table>
        <h2><?php echo $message?></h2>
    </div>
</form>
<?php
	$contenu=ob_get_clean();
	require 'gabarit.php';
?>