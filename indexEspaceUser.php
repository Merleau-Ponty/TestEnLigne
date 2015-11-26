<?php
    session_start();
    if(isset($_SESSION['user'])){
        //Parcours le fichier demandé
        require 'modele/modele.php';        
        require 'modele/fonction.php';
        
        $user = $_SESSION['user'];
        $statut = getStatut($user);
        $statut = implode($statut[0]);
        if ($statut == 1){
            require 'vue/navAdmin.php';
        } else {
            require 'vue/navUser.php';
        }
        $id_user = $user;
        $affiche_note= getAfficheNote($id_user);
        $max=count($affiche_note);
        
        $moyenne = getMoyenne($user);

        if(!empty($_POST['nom']) || !empty($_POST['prenom']) || !empty($_POST['login']) || !empty($_POST['mdp']) ||!empty($_POST['mdpc'])){
            getChampsModif();
        }
        
        require 'vue/vueEspaceUser.php';
    }
?>