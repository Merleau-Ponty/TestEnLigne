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
            
            if(isset($_POST['libelle_test'])){
                getTestChamps();
            } else{
                getComprendChamps();
            }

        } else {
           header('Location: indexEspaceUser.php'); 
        }
            require 'vue/vueAjoutTest.php';  
    } else {
        header('Location: index.php');
    }
?>