<?php
    //Parcours le fichier demandé
    require 'modele/modele.php';        
    require 'modele/fonction.php';
    
    $message="";
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) &&  !empty($_POST['login']) && !empty($_POST['mdp']) && !empty($_POST['mdpc'])){
        $login = $_POST['login'];
        $verif = getVerifInsc($login);
        if (!empty($verif)){
            $message = "Cet utilisateur existe déjà";
        } else {
            getInscChamps();
            $message = "Inscription validée";
        }
    }
    
    require 'vue/vueInscription.php';
?>