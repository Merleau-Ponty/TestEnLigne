<!DOCTYPE html>
<html>
    <head>
	<meta charset='utf-8' />	
	<title><?=$titre?></title>
	<link rel='stylesheet' type='text/css' href='css/style.css'/>
	<link rel="icon" type="image/png" href="img/logo_merleau.png" />
    </head>
		
    <body>
	<header>
            <div class='logo' alt='logo_merleau'><!-- Logo Merleau --></div>
            <!--Titre de chaque page-->
            <div class='title'>
                <h1><?=$titre?></h1>
            </div>
            <!-- Nom de la personne connectée et bouton de déconnexion-->
            <div class='log-deco'>
                <?php
                if (isset($_SESSION['user'])){
                    $login = $_SESSION['user'];
                    $user = getUsername($login);
                    //supprime les doublons générés par le implode
                    $username = implode(" ",array_unique($user[0]));
                    echo "<a href='indexEspaceUser.php'><div class='logo_user'><!-- Logo User --></div>
                    <div class='name_dec'>$username</div></a>
                    <a href='deconnexion.php'><div class='logo_deco'><!-- Logo Deconnexion --></div>
                    <div class='name_dec'>Déconnexion</div></a>";
                }
                ?>
            </div>
            </header>
            <!-- Affiche le menu sur toutes les pages qui ou un utilisateur est connecté -->
                <?php
                if (isset($_SESSION['user'])){
                    echo "<nav>";
                    echo "$nav";
                    echo "</nav>
                          <section id='navfixe'>";
                } else {
                    echo "<section class='sansNav'>";
                }
                ?>
                <!-- Affiche le contenu des vues -->
                <?=$contenu?>
            </section>
            <footer>
                <hr />
                <h4>Lycée Merleau Ponty website &copy; - BTS SIO Rochefort - webmaster: Maxime Guérin & Ken Lemière</h4>
            </footer>
    </body>
</html>