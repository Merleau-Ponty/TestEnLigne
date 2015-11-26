<?php
    include('include/BDD.php');

    //Ajout de catégorie dans la base de données
    function getAjoutCat($libelle_cat){
        $connexion= getBDD();
        $requete="insert into categories(libelle_cat) values ('$libelle_cat');";
        $ajout_cat=$connexion->insert($requete);
        return $ajout_cat;
    }

    //Verifie si la catégorie existe dans la base de données
    function getVerifCat($libelle_cat){
        $connexion= getBDD();
        $requete="select libelle_cat from categories where libelle_cat = '$libelle_cat';";
        $ajout_cat=$connexion->select($requete);
        return $ajout_cat;
    }
    
    function noQTInCat($num_cat2){
        $connexion= getBDD();
        $requete="select libelle_cat from categories where num_cat = $num_cat2;";
        $get_cat=$connexion->select($requete);
        return $get_cat;
    }
    
    function noRepForQuest($num_quest2){
        $connexion= getBDD();
        $requete="select libelle_quest from question where num_quest = $num_quest2;";
        $get_quest=$connexion->select($requete);
        return $get_quest;
    }
    
    //Récupère les catégories pour ensuite les afficher dans une liste déroulante
    function getAfficheCat(){
        $connexion= getBDD();
        $message='';
        $requete="select num_cat, libelle_cat from categories;";
        $affiche_cat=$connexion->select($requete);
        return $affiche_cat;
    }
    
    function getAfficheRep($num_quest2){
        $connexion= getBDD();
        $message= '';
        $requete="select libelle_rep from reponses where num_quest= $num_quest2;";
        $affiche_rep=$connexion->select($requete);
        return $affiche_rep;
    }

    //Ajout de questions dans la base de données
    function getAjoutQuest($libelle_quest, $type_selec, $num_cat1){
        $connexion= getBDD();
        $requete="insert into question(libelle_quest, type_selec, num_cat) values ('$libelle_quest', $type_selec, $num_cat1);";
        $ajout_qr=$connexion->insert($requete);
        return $ajout_qr;
    }

    //Récupère le numéro d'une question par rapport à son libelle
    //pour ensuite lui affecter des réponses
    function getNumQuest($libelle_quest){
        $connexion= getBDD();
        $requete="select num_quest from question where libelle_quest='$libelle_quest';";
        $affiche_numQuest=$connexion->select($requete);
        return $affiche_numQuest;
    }

    //Ajout de réponses dans la base de données
    function getAjoutRep($num_quest, $libelle_rep, $juste){
        $connexion= getBDD();
        $requete="insert into reponses(num_quest, libelle_rep, juste) values ($num_quest, '$libelle_rep', $juste);";
        $ajout_rep=$connexion->insert($requete);
        return $ajout_rep;
    }

    //Vérifie si la question existe déjà ou non dans la base de données
    function getVerifQ($libelle_quest) {
        $connexion= getBDD();
        $requete="select num_quest from question where libelle_quest = '$libelle_quest';";
        $ajout_q=$connexion->select($requete);
        return $ajout_q;
    }

    //Vérifie que la réponse existe ou pas dans la base de données
    function getVerifR($libelle_rep, $num_quest) {
        $connexion= getBDD();
        $requete="select libelle_rep from reponses where libelle_rep='$libelle_rep' and num_quest='$num_quest';";
        $ajout_r=$connexion->select($requete);
        return $ajout_r;
    }
    
    //Récupère les questions pour ensuite les afficher dans une liste déroulante
    function getAfficheQuest($num_cat2){
        $connexion= getBDD();
        $message='';
        $requete="select num_quest, libelle_quest from question where num_cat='$num_cat2';";
        $affiche_quest=$connexion->select($requete);
        return $affiche_quest;
    }

    //Entre une nouvelle inscription dans la base de données
    function getInscription($nom, $prenom, $login, $mdp){
        $connexion= getBDD();
        $requete="insert into utilisateur(nom_user, prenom_user, login_user, pwd_user, admin) values ('$nom', '$prenom', '$login', '$mdp', 0);";
        $ajout_user=$connexion->insert($requete);
        return $ajout_user;
    }

    //Regarde si la personne qui essaie de se connecter existe dans la base de données
    function getVerifConnexion($login, $mdp){
        $connexion = getBDD();
        $requete = "SELECT num_user, nom_user, prenom_user, login_user, pwd_user, admin
                            FROM utilisateur
                            WHERE login_user =:login and pwd_user=:mdp";
        $param=array(':login' => $login, ':mdp' => $mdp);
        $ligne = $connexion->prepare_select($requete,$param);
        return $ligne;
    }

    //Récupère le nom et prénom de l'utilisateur pour l'afficher dans le header
    function getUsername($login){
        $connexion = getBDD();
        $requete = "SELECT  prenom_user, nom_user
                            FROM utilisateur
                            WHERE login_user =:login";
        $param=array(':login' => $login);
        $ligne = $connexion->prepare_select($requete,$param);
        return $ligne;
    }

    //Récupère le nom de l'utilisateur pour l'afficher dans l'espace utilisateur
    function getNomUser($login){
        $connexion = getBDD();
        $requete = "SELECT  nom_user
                            FROM utilisateur
                            WHERE login_user =:login";
        $param=array(':login' => $login);
        $ligne = $connexion->prepare_select($requete,$param);
        return $ligne;
    }

    //Récupère le prenom de l'utilisateur pour l'afficher dans l'espace utilisateur
    function getPrenomUser($login){
        $connexion = getBDD();
        $requete = "SELECT  prenom_user
                            FROM utilisateur
                            WHERE login_user =:login";
        $param=array(':login' => $login);
        $ligne = $connexion->prepare_select($requete,$param);
        return $ligne;
    }

    //Récupère le statut de l'utilisateur pour l'afficher dans l'espace utilisateur
    function getStatutUser($login) {
        $connexion = getBDD();
        $requete = "SELECT  admin
                            FROM utilisateur
                            WHERE login_user =:login";
        $param=array(':login' => $login);
        $ligne = $connexion->prepare_select($requete,$param);
        return $ligne;
    }

    //Vérifie si le login saisie par la personne qui veut 
    //s'inscrire existe déjà dans la base de données
    function getVerifInsc($login){
        $connexion = getBDD();
        $requete = "SELECT  login_user
                            FROM utilisateur
                            WHERE login_user =:login";
        $param=array(':login' => $login);
        $ligne = $connexion->prepare_select($requete,$param);
        return $ligne;
    }

    //Modifie le nom par le nouveau saisie dans l'espace utilisateur
    function getModifNom($login, $nom){
        $connexion= getBDD();
        $requete="UPDATE utilisateur 
                    SET nom_user='$nom'
                    WHERE login_user='$login';";
        $ajout_user=$connexion->insert($requete);
        return $ajout_user;
    }

    //Modifie le prenom par le nouveau saisie dans l'espace utilisateur
    function getModifPrenom($login, $prenom){
        $connexion= getBDD();
        $requete="UPDATE utilisateur 
                    SET prenom_user='$prenom' 
                    WHERE login_user='$login';";
        $ajout_user=$connexion->insert($requete);
        return $ajout_user;
    }

    //Modifie le mot de passe par le nouveau saisie dans l'espace utilisateur
    function getModifMDP($login, $mdp){
        $connexion= getBDD();
        $requete="UPDATE utilisateur 
                    SET pwd_user = '$mdp' 
                    WHERE login_user='$login';";
        $ajout_user=$connexion->insert($requete);
        return $ajout_user;
    }
    
    //Récupère le statut admin ou user pour l'affichage du menu
    function getStatut($login){
        $connexion = getBDD();
        $requete = "SELECT  admin
                            FROM utilisateur
                            WHERE login_user ='$login'";
        $ligne = $connexion->select($requete);
        return $ligne;
    }
    
    //Affiche les utilisateurs pour changer les droits d'administration
    function getAfficheUser(){
        $connexion = getBDD();
        $requete = "select num_user, nom_user, prenom_user from utilisateur;";
        $ligne = $connexion->select($requete);
        return $ligne;
    }
    
    //Modifie le droit d'admin de l'utilisateur
    function getSetAdmin($num_user, $admin){
        $connexion= getBDD();
        $requete="UPDATE utilisateur
                    SET admin = $admin
                    WHERE num_user = $num_user;";
        $setAdmin=$connexion->insert($requete);
        return $setAdmin;
    }

function getAfficheChoixTest($num_cat2){
    $connexion= getBDD();
    $message='';
    $requete="select num_test, libelle_test from tests where num_cat = $num_cat2;";
    $affiche_test=$connexion->select($requete);
    return $affiche_test;
}  

function getAfficheQT($num_test){
    $connexion= getBDD();
    $message='';
    $requete="select libelle_quest from question 
                inner join comprend
                on question.num_quest = comprend.num_quest
                where num_test = $num_test";
    $affiche_test=$connexion->select($requete);
    return $affiche_test;
}

function getAfficheLesRep($numQ){
    $connexion= getBDD();
    $message='';
    $requete="select num_rep, libelle_rep from reponses
            inner join question 
            on reponses.num_quest = question.num_quest 
            where question.num_quest = $numQ";
    $affiche_rep=$connexion->select($requete);
    return $affiche_rep;
}

function getRecupNumQ($num_test){
    $connexion= getBDD();
    $message='';
    $requete="select question.num_quest from question 
                inner join comprend
                on question.num_quest = comprend.num_quest
                where num_test = $num_test";
    $affiche_test=$connexion->select($requete);
    return $affiche_test;
}
function getRecupSelect($num_test){
    $connexion= getBDD();
    $message='';
    $requete="select question.type_selec from question 
                inner join comprend
                on question.num_quest = comprend.num_quest
                where num_test = $num_test";
    $affiche_selec=$connexion->select($requete);
    return $affiche_selec;
}

//Fonction qui récupère le nombre de bonnes réponses que comporte le test effectué
function getNotation($nums_rep){
    $connexion= getBDD();
    $message='';
    $max= count($nums_rep);
    for($i=0; $i!=$max; $i++){
        $requete="select num_rep, juste from reponses where num_rep=$nums_rep[$i] and juste = 0;";
        $test_null[$i]=$connexion->select($requete);
        if($test_null[$i] != null){
            $tab_juste[$i] =$test_null[$i];
        }
    }
    return $tab_juste;
}

//Fonction qui récupère le nombre de bonnes réponses saisies par l'utilisateur sur les boutons radio
function getNote($tab_numRepRD){
    $connexion= getBDD();
    $message='';
    $max= count($tab_numRepRD);
    $justeRD='';
    $ii=0;
    for($i=0; $i!=$max; $i++){
        $tab_numRepRD[$i] = intval($tab_numRepRD[$i]);
        $requete="select juste from reponses where num_rep=$tab_numRepRD[$i] and juste='0';";
        $justeRD1[$i]=$connexion->select($requete);
        if($justeRD1[$i] != null){
            $justeRD[$ii] = $justeRD1[$i];
            $ii++;
        }
    }
    if($justeRD!=''){
        return $justeRD;
    }
}

//Fonction qui récupère le nombre de bonnes réponses saisies par l'utilisateur sur les checkbox
function getNote1($tab_numRepCB){
    $connexion= getBDD();
    $message='';
    $max1=  count($tab_numRepCB);
    $ii=0;
    $justeCB='';
    for($i=0; $i!=$max1; $i++){
        $tab_numRepCB[$i] = intval($tab_numRepCB[$i]);
        $requete="select juste from reponses where num_rep=$tab_numRepCB[$i] and juste='0';";
        $justeCB1[$i]=$connexion->select($requete);
        if($justeCB1[$i] != null){
            $justeCB[$ii] = $justeCB1[$i];
            $ii++;
        }
    }
    if($justeCB!=''){
        return $justeCB;
    }
}

//Fonction qui récupère le nombre de mavaises réponses saisies par l'utilisateur sur les check box
function getNote_1($tab_numRepCB){
    $connexion= getBDD();
    $message='';
    $max1=  count($tab_numRepCB);
    $ii=0;
    $fauxCB='';
    for($i=0; $i!=$max1; $i++){
        $tab_numRepCB[$i] = intval($tab_numRepCB[$i]);
        $requete="select juste from reponses where num_rep=$tab_numRepCB[$i] and juste='1';";
        $fauxCB1[$i]=$connexion->select($requete);
        if($fauxCB1[$i] != null){
            $fauxCB[$ii] = $fauxCB1[$i];
            $ii++;
        }
    }
    if($fauxCB!=''){
        return $fauxCB;
    }
}
//Fonction qui récupère le nombre de mauvaises réponses saisies par l'utilisateur sur les boutons radio
function getNote_2($tab_numRepRD){
    $connexion= getBDD();
    $message='';
    $max= count($tab_numRepRD);
    $fauxRD='';
    $ii=0;
    for($i=0; $i!=$max; $i++){
        $tab_numRepRD[$i] = intval($tab_numRepRD[$i]);
        $requete="select juste from reponses where num_rep=$tab_numRepRD[$i] and juste='1';";
        $fauxRD1[$i]=$connexion->select($requete);
        if($fauxRD1[$i] != null){
            $fauxRD[$ii] = $fauxRD1[$i];
            $ii++;
        }
    }
    if($fauxRD!=''){
        return $fauxRD;
    }
}

//Fonction qui récupère le nombre de bonnes réponses saisies par l'utilisateur sur les boutons radio
function getCorrect($tab_numRepRD){
    $connexion= getBDD();
    $message='';
    $max= count($tab_numRepRD);
    $justeRD='';
    $ii=0;
    for($i=0; $i!=$max; $i++){
        $tab_numRepRD[$i] = intval($tab_numRepRD[$i]);
        $requete="select libelle_rep from reponses where num_rep=$tab_numRepRD[$i] and juste='0';";
        $justeRD1[$i]=$connexion->select($requete);
        if($justeRD1[$i] != null){
        $justeRD[$ii] = $justeRD1[$i];
            $ii++;
        }
    }
    if($justeRD!=''){
        return $justeRD;
    }
}

//Fonction qui récupère le nombre de bonnes réponses saisies par l'utilisateur sur les checkbox
function getCorrect1($tab_numRepCB){
    $connexion= getBDD();
    $message='';
    $max1=  count($tab_numRepCB);
    $ii=0;
    $justeCB='';
    for($i=0; $i!=$max1; $i++){
        $tab_numRepCB[$i] = intval($tab_numRepCB[$i]);
        $requete="select libelle_rep from reponses where num_rep=$tab_numRepCB[$i] and juste='0';";
        $justeCB1[$i]=$connexion->select($requete);
        if($justeCB1[$i] != null){
            $justeCB[$ii] = $justeCB1[$i];
            $ii++;
        }
    }
    if($justeCB!=''){
        return $justeCB;
    }
}

//Fonction qui récupère le nombre de mavaises réponses saisies par l'utilisateur sur les check box
function getIncorrect_1($tab_numRepCB){
    $connexion= getBDD();
    $message='';
    $max1=  count($tab_numRepCB);
    $ii=0;
    $fauxCB='';
    for($i=0; $i!=$max1; $i++){
        $tab_numRepCB[$i] = intval($tab_numRepCB[$i]);
        $requete="select libelle_rep from reponses where num_rep=$tab_numRepCB[$i] and juste='1';";
        $fauxCB1[$i]=$connexion->select($requete);
        if($fauxCB1[$i] != null){
            $fauxCB[$ii] = $fauxCB1[$i];
            $ii++;
        }
    }
    if($fauxCB!=''){
        return $fauxCB;
    }
}
//Fonction qui récupère le nombre de mauvaises réponses saisies par l'utilisateur sur les boutons radio
function getIncorrect_2($tab_numRepRD){
    $connexion= getBDD();
    $message='';
    $max= count($tab_numRepRD);
    $fauxRD='';
    $ii=0;
    for($i=0; $i!=$max; $i++){
        $tab_numRepRD[$i] = intval($tab_numRepRD[$i]);
        $requete="select libelle_rep from reponses where num_rep=$tab_numRepRD[$i] and juste='1';";
        $fauxRD1[$i]=$connexion->select($requete);
        if($fauxRD1[$i] != null){
            $fauxRD[$ii] = $fauxRD1[$i];
            $ii++;
        }
    }
    if($fauxRD!=''){
        return $fauxRD;
    }
}

function getSaveNote($note2){
    $connexion= getBDD();
    $user = $_SESSION['user'];
    $test = $_SESSION['test'];
    $requete="select num_user from utilisateur where login_user='$user';";
    $num_user=$connexion->select($requete);
    $num_user1 = $num_user[0]['num_user'];
    $connexion= getBDD();
    $requete="select * from fait where num_user='$num_user1' and num_test='$test' and note='$note2';";
    $try=$connexion->select($requete);
    if($try == null){
    $connexion= getBDD();
    $requete="insert into fait(num_user, num_test, note) values ('$num_user1', '$test', '$note2');";
    $ajout_test=$connexion->insert($requete);   
    }
}

//Fonction qui calcul la moyenne des notes de l'utilisateur
function getMoyenne($user){
    $connexion= getBDD();
    $user = $_SESSION['user'];
    $requete="select num_user from utilisateur where login_user='$user';";
    $num_user=$connexion->select($requete);
    $num_user1 = $num_user[0]['num_user'];
    $connexion= getBDD();
    $requete="select note from fait where num_user = $num_user1;";
    $notes=$connexion->select($requete);
    $max = count($notes);
    $total = 0;
    for($i=0;$i!=$max;$i++){
        $total = $total + implode($notes[$i]);
    }
    if($max!=0){
        $moyenne = $total/$max;
        return $moyenne;
    }
}

function getAjoutTest($libelle_test, $difficulte,$num_cat ){
    $connexion= getBDD();
    $requete="insert into tests(libelle_test, difficulte, num_cat) values ('$libelle_test', '$difficulte', '$num_cat');";
    $ajout_test=$connexion->insert($requete);
    return $ajout_test;
}

function getVerifTest($libelle_test){
    $connexion= getBDD();
    $requete="select libelle_test from tests where libelle_test = '$libelle_test';";
    $ajout_test=$connexion->select($requete);
    return $ajout_test;
}

function getAfficheTest(){
    $connexion= getBDD();
    $message='';
    $requete="select num_test, libelle_test from tests;";
    $affiche_test=$connexion->select($requete);
    return $affiche_test;
}
//fonction pour l'ajax pour la page de test
function getRecupTest($num_cat){
    $connexion= getBDD();
    $requete="select num_test, libelle_test, difficulte from tests where num_cat = $num_cat;";
    $recup_test=$connexion->select($requete);
    return $recup_test;
}
function getRecupQuest($num_cat){
    $connexion= getBDD();
    $requete="select num_quest, libelle_quest from question where num_cat = $num_cat;";
    $recup_quest=$connexion->select($requete);
    return $recup_quest;
}

function getRecupQuest1($num_test){
    $connexion= getBDD();
    $requete="select question.num_quest, question.libelle_quest from question inner join comprend on question.num_quest = comprend.num_quest where num_test = $num_test;";
    $recup_quest=$connexion->select($requete);
    return $recup_quest;
}

function getAjoutComprend($num_test, $num_quest){
    $connexion= getBDD();
    $requete="insert into comprend(num_test, num_quest) values ($num_test, $num_quest);";
    $ajout_comprend=$connexion->insert($requete);
    return $ajout_comprend;
}   

function getVerifComprend($num_test, $num_quest){
    $connexion= getBDD();
    $requete="select * from comprend where num_test='$num_test' and num_quest='$num_quest';";
    $ajout_comprend=$connexion->select($requete);
    return $ajout_comprend;
}

function noTinCat($nom_cat){
    $connexion= getBDD();
    $requete = "select libelle_cat from categories where num_cat = $num_cat";
    $noCat=$connexion->select($requete);
    return $noCat;
}

function noQinCat($num_cat){
    $connexion= getBDD();
    $requete = "select libelle_cat from categories where num_cat = $num_cat";
    $noCat=$connexion->select($requete);
    return $noCat;
}

function noQinTest($num_test){
    $connexion= getBDD();
    $requete = "select libelle_test from tests where num_test = $num_test";
    $noTest=$connexion->select($requete);
    return $noTest;
}

function getAfficheNote($id_user){
    $connexion= getBDD();
    $requete = "select libelle_test, note from tests 
                inner join fait 
                on tests.num_test = fait.num_test
                where id_fait in 
                    (select id_fait from fait where num_user in 
                        (select num_user from utilisateur where login_user ='$id_user'));;";
    $tab_note=$connexion->select($requete);
    return $tab_note;
}

function getTestDiff($num_cat){
    $connexion= getBDD();
    $requete = "select libelle_test, difficulte from tests where num_cat=$num_cat2;";
    $test=$connexion->select($requete);
    return $test;
}

//liaison à la base de données
function getBDD(){
    return new BDD('testenligne');
}
?>