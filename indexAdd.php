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
            if(empty($_POST['libelle_cat'])){
                if(empty($_POST['libelle_quest']) && empty($_POST["libelle_repo0"])){   
                    getRepChamps();
                }else{
                    getQRChamps();
                }
            } else {
                getCatChamps();
            }
	    require 'vue/vueAjoutCat.php';
        } else {
           header('Location: indexChoixTest.php'); 
        }
    } else {
        header('Location: index.php');
    }
?>