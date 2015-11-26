<?php
    //Parcours le fichier demandé
    require 'modele/modele.php';        
    require 'modele/fonction.php';
    
    $message="";    
    if ( isset($_POST['login'])){
        $loginOK=false;
        if (empty($_POST['login'])|| empty($_POST['mdp']) ) {
            $message="Vous devez saisir le login et le mot de passe";
        }else{
            $ligne = getConnexion();
            if($ligne==null){
                $message="Authentification incorrect";
            }else{
                $loginOK = true ;
            }
        }
        //on traitera le problème plus tard
        if ($loginOK) {
            session_start ();
            $_SESSION['user']=$_POST['login'];
            header('Location:indexAdd.php');
        }
    }
    require 'vue/vueConnexion.php';
?>
