<?php
    //Récupère les champs saisie pour les questions et réponses 
    //pour ensuite les enregistrer dans la base en appelant les fonctions de modele.php 
    function getQRChamps(){
        $libelle_quest = ucfirst(addslashes($_POST['libelle_quest']));
        $type_selec = $_POST['type_selec'];
        $num_cat1 = intval($_POST['num_cat1']); //selection seulement les chiffres de la chaine de caractère
        $ajout_q= getVerifQ($libelle_quest);
        $max = 0;
        $j = 0;
        $jj = 0;
        while((!empty($_POST["libelle_repo$j"])) && $j < 10){
            $max = $j + 1;
            $j++;
        }
        if (empty($ajout_q) && $libelle_quest != ""){
            $ajout_qr=getAjoutQuest($libelle_quest, $type_selec, $num_cat1); 
            $affiche_numQuest=getNumQuest($libelle_quest);
            $num_quest = implode($affiche_numQuest[0]);
            for ($i=0;$i!=$max;$i++){
                $libelle_rep = ucfirst(addslashes($_POST["libelle_repo$i"])); //met la premiere lettre en majuscule & ajoute un  slash aux quote pour ne pas interféré avec les quotes des requetes SQL
                $juste = $_POST["juste$i"];
                $ajout_r= getVerifR($libelle_rep, $num_quest);
                if(empty($ajout_r)){
                    $ajout_rep = getAjoutRep($num_quest, $libelle_rep, $juste);
                }
            }    
        }
    }

    //Récupère les champs saisie pour les quatégories 
    //pour ensuite les enregistrer dans la base en appelant les fonctions de modele.php 
    function getCatChamps(){
        $libelle_cat = ucfirst(strtolower($_POST['libelle_cat'])); //met toutes les lettres en minuscule puis la première lettre en minuscule
        $verif_cat= getVerifCat($libelle_cat);
        if (empty($verif_cat)){
            $ajout_cat=getAjoutCat($libelle_cat);
        }
    }
    
    //Récupère les champs saisie pour l'inscription
    //pour ensuite les enregistrer dans la base en appelant les fonctions de modele.php 
    function getInscChamps(){
        $nom = ucfirst($_POST['nom']);
        $prenom = ucfirst($_POST['prenom']);
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];
        $mdpc = $_POST['mdpc'];
        if ($mdp == $mdpc){
            $mdp = md5(md5($mdp));
            getInscription($nom, $prenom, $login, $mdp);
        }
    }
    
    //Récupère les champs saisie pour se connecter 
    //pour ensuite accéder au reste de l'appli disponible suivant le statut
    function getConnexion(){
        $login=$_POST['login'];
        $mdp=$_POST['mdp'];
        $mdp = md5(md5($mdp));
        $ligne = getVerifConnexion($login, $mdp);
        return $ligne;
    }
    
    //Récupère les champs saisie pour se modifier des infos
    //Pour ensuite les enregistrer avec les fonctions appelées
    function getChampsModif(){
        $login = $_SESSION['user'];
        $nom = ucfirst($_POST['nom']);
        $prenom = ucfirst($_POST['prenom']);
        $mdp = $_POST['mdp'];
        $mdpc = $_POST['mdpc'];
        if (!empty($nom)){
            getModifNom($login, $nom); 
        } 
        if (!empty($prenom)){
            getModifPrenom($login, $prenom); 
        }
        if ($mdp == $mdpc){
            if (!empty($mdp)){
                $mdp=md5(md5($mdp));
                getModifMDP($login, $mdp); 
            }
        }
    }  
    
    function getNav(){
        $user = $_SESSION['user'];
        $statut = getStatut($user);
        $statut = implode($statut[0]);
        if ($statut == 1){
            require 'vue/navAdmin.php';
        } else {
            require 'vue/navUser.php';
        }
    }
    
    //Récupère les champs saisie pour les réponses 
    //pour ensuite les enregistrer dans la base en appelant les fonctions de modele.php 
    function getRepChamps(){
        for($i=0;$i!=5;$i++){
            if(isset($_POST["libelle_rep$i"], $_POST["juste$i"])){
                $libelle_rep = ucfirst(addslashes($_POST["libelle_rep$i"])); //met la premiere lettre en majuscule & ajoute un  slash aux quote pour ne pas interféré avec les quotes des requetes SQL
                $juste = $_POST["juste$i"];
                $num_quest = intval($_POST['num_quest1']);
                $ajout_rep= getVerifR($libelle_rep, $num_quest);
                if (empty($ajout_rep) && !empty($_POST["libelle_rep$i"])){
                    $ajout_rep = getAjoutRep($num_quest, $libelle_rep, $juste);
                }
            }
        }
    }
    
    function getResultCB(){
        $i=0;
        foreach($_POST["checkbox"] as $chkbx){
            $tab_resultCB[$i]=$chkbx;
            $i++;
	}
        return $tab_resultCB;
    }
    
    function getResultRadio($cpt1){
        $cpt = 0;
        $cpt1 = intval($cpt1)-1;
        for($i=0;$i<=$cpt1;$i++){				
            $tab_resultRD[$i]=$_POST["radio$cpt"];
            $cpt++;
        }
        return $tab_resultRD;
    }
    
    function getRecupNumRep($num_cat){
        $num_rep = getAfficheLesRep($num_cat);
        $max = count($num_rep);
        for($i=0;$i!=$max;$i++){
            $numR[$i]=$num_rep[$i]['num_rep'];
        }
        return $numR;
    }
    
    //gere les champs de l'ajout d'un test 
    //et vérifie s'il existe deja dans la bdd
    //puis l'ajoute en appelant la fonction qui execute la requet sql
    function getTestChamps(){
        $libelle_test = ucfirst(strtolower($_POST['libelle_test'])); //met toutes les lettres en minuscule puis la première lettre en minuscule
        $difficulte = $_POST['difficulte'];
        $num_cat = intval($_POST['num_cat']);
        $verif_test= getVerifTest($libelle_test);
        if (empty($verif_test) && $libelle_test!=""){
            $ajout_test=  getAjoutTest($libelle_test, $difficulte, $num_cat);
        }
    }
    
    //Recupere les champs de l'ajout de question pour un test
    //et vérifie s'il existe deja dans la bdd
    //puis l'ajoute en appelant la fonction qui execute la requet sql
    function getComprendChamps(){
        for($ii=1;$ii<6;$ii++){
            if(!empty($_POST["num_test"]) && $_POST["num_TQuest$ii"]!=0){
                $num_test =intval($_POST["num_test"]);
                $num_quest =intval($_POST["num_TQuest$ii"]);
                $verif_comprend = getVerifComprend($num_quest, $num_test);
                if(empty($verif_comprend)){
                    $ajout_Comprend =getAjoutComprend($num_test, $num_quest);
                }
            }
        }
    }
    
?>