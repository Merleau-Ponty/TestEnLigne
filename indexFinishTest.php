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
        $cpt1 = $_POST['cpt1'];
        $num_cat = $_POST['num_cat'];
        $nb_rep = $_POST['nb_rep'];
        for($i=0;$i!=$nb_rep;$i++){
            $nums_rep[$i] = $_POST["nums_rep$i"];
        }
        
        $tab_resultCB=getResultCB();
        $tab_resultRD=getResultRadio($cpt1);
        
        $max = count($tab_resultCB);
        for($i=0;$i!=$max;$i++){
            $tab_numRepCB[$i] = $tab_resultCB[$i];
        }
        
        $max = count($tab_resultRD);
        for($i=0;$i!=$max;$i++){
            $tab_numRepRD[$i] =$tab_resultRD[$i];
        }
        
        $notation = getNotation($nums_rep);
        //recupère le numéro des bonnes et mauvaises réponses
        //bonnes
        $note = getNote($tab_numRepRD);
        $note1 = getNote1($tab_numRepCB);
        //mauvaises
        $notef = getNote_1($tab_numRepCB);
        $notef1= getNote_2($tab_numRepRD);
        
        //recupère le libelle des bonnes et mauvaises réponses
        //bonnes
        $cor1 = getCorrect($tab_numRepRD);
        $cor2 = getCorrect1($tab_numRepCB);
        //mauvaises
        $incor1 = getIncorrect_1($tab_numRepCB);
        $incor2= getIncorrect_2($tab_numRepRD);
        
        $resultat = 0;
        $max = count($note);
        
	require 'vue/vueFinishTest.php';
    } else {
        header('Location: index.php');
    }
?>