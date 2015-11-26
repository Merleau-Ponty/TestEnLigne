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
        } else {
            require 'vue/navUser.php';
        }
        
	require 'vue/vueChoixTest.php';
    } else {
        header('Location: index.php');
    }
?>