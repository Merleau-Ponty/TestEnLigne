<?php
    session_start();
    //Parcours le fichier demandé
    require 'modele/modele.php';        
    require 'modele/fonction.php';
            
    $login = $_SESSION['user'];
    $getStatut = getStatut($login);
    $statut = implode($getStatut[0]);
    $_SESSION['test'] = $_POST['num_test'];
    
    if(isset($_SESSION['user'])){
        if($statut == 1){
            require 'vue/navAdmin.php';
        } else {
            require 'vue/navUser.php';
        }
        if($_POST['num_test']!=null){
            require 'vue/vueDoTest.php';
        }else{
           header('Location: indexChoixTest.php'); 
        }
    } else {
        header('Location: index.php');
    }
?>