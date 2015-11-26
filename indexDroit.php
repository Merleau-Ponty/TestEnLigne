<?php
    session_start();
    //Parcours le fichier demandé
    require 'modele/modele.php';        
    require 'modele/fonction.php';
            
    $login = $_SESSION['user'];
    $getStatut = getStatut($login);
    $statut = implode($getStatut[0]);
    
    if(isset($_SESSION['user'])){
        if($statut == 1){
            require 'vue/navAdmin.php';
            require 'vue/vueDroit.php';
            
            if(isset($_POST['num_user'], $_POST['admin'])){
                $num_user = intval($_POST['num_user']);
                $admin = $_POST['admin'];
                getSetAdmin($num_user, $admin);
            }
        } else {
           header('Location: indexEspaceUser.php'); 
        }
    } else {
        header('Location: index.php');
    }
?>