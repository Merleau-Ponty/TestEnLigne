<?php 
    $titre='Ajout de test';
    ob_start();
?>
<html>
    <!-- Formulaire d'ajout de catégorie -->
    <form class="form" name='form' method='post' action='indexTest.php'>
        <div>
            <body>
            <h2>Ajout de test</h2>
            <table>
                <tr>
                    <th>
                        <label class='text_texteArea' for="categorie">Tests déjà existants : </label>
                        <br/><br/>
                    </th>
                    <th>
                        <?php
                            $affiche_test= getAfficheTest();
                            $max=count($affiche_test);
                            echo "<select name='test' style='max-width:300px;' size='4'>";
                            for($i=0;$i!=$max;$i++){
                                $ligne = $affiche_test[$i];
                                echo "<option >";
                                echo $ligne['libelle_test'];
                                echo "</option>";
                            }
                            echo "</select>";
                        ?>
                        <br /><br />
                    </th>
                </tr>
                <tr>
                    <th>
                        <label for='libelle_test'>Entrez le libelle du test :</label>
                    </th>
                    <th>
                        <input class='verification' name='libelle_test' id='libelle_test' size='50' type='text'  onblur='validation_test();' />
                        <br/><br/>
                    </th>
                    <br/><br/>
                </tr>
                <tr>
                    <!--Choix de la catégorie-->
                    <th>
                        <label class='text_texteArea' for="categorie">Choisissez la catégorie de la question : </label>
                        <br/><br/>
                    </th>
                    <th>
                        <?php
                            $affiche_cat=  getAfficheCat();
                            $max=count($affiche_cat);
                            echo "<select name='num_cat'>";
                            for($i=0;$i!=$max;$i++){
                                $ligne = $affiche_cat[$i];
                                echo "<option >";
                                echo $ligne['num_cat'],' ',$ligne['libelle_cat'];
                            }
                            echo "</option></select>";
                        ?>
                        <br /><br />
                    </th>
                </tr>
                <tr>
                    <th>
                        <label for='difficulte'>Choisir la difficulté de ce test :</label>
                        <br/><br/>
                    </th>
                    <td>
                        <label><input type="radio" name="difficulte" value="1" checked="checked">Facile</label>
                        <label> <input type="radio" name="difficulte" value="2">Moyen</label>
                        <label><input type="radio" name="difficulte" value="3">Difficile</label>
                        <br/><br/>
                    </td>
                </tr>
            </table>
            <span class='tooltip' id='tooltipLibelle' >* Champ obligatoire</span>
            <span class='tooltip1' id='tooltipLib' >Le test a bien été enregistré</span>
            <!--Envoi et annulation-->
            <p class='boutons'>
                <input value='Valider' type='submit' onclick='trait_form();'/>
                <input value='Annuler' type='reset' onfocus='trait_form();'/>
            </p>
        </div>
    </form>
    <form class='form' name='form' method='post' action='indexTest.php'>
        <div>
            <h2>Ajout des questions pour le test</h2>
                <table>
                    <tr>
                        <th>
                            <label class='text_texteArea' for='test'>Choisissez la catégorie :</label>
                            <br/><br/><br/> 
                        </th>
                        <th>
                            <!-- Pour afficher la liste déroulante des test-->
                            <?php
                                $affiche_cat= getAfficheCat();
                                $max=count($affiche_cat);
                                $j = 0;
                                echo "<select name='num_cat' id='num_cat'>";
                                echo "<option>- - - Choisissez la catégorie - - -</option>";
                                while($j!=$max){
                                    $ligne = $affiche_cat[$j];
                                    echo '<option >';
                                    echo $ligne['num_cat'],' ',$ligne['libelle_cat'];
                                    $j++;
                                }
                                echo "</option></select>";
                                echo'<br/>';
                            ?>   
                            <br/><br/>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label class='text_texteArea' for='test'>Choisissez le test :</label>
                            <br/><br/><br/>               
                        </th>
                        <th> 
                            <select name='num_test' id='num_test'>
                                <option>- - - Choisissez le test - - -</option>
                            </select>                
                            <br/><br/>
                        </th>
                     </tr>
                     <tr>
                         <th></th>
                         <th>
                             <?php
                                echo"<select name='num_quest1' id='num_quest1' style='width: 300px;' size='4' >";
                                echo"<option value=''> - - - Questions inexistantes - - -</option></select>";
                             ?>
                             <br/><br/>
                         </th>
                    </tr>
                    <tr>
                         <th>
                    <label class='text_texteArea' for='quest'>Choisissez la question :</label>
                        <br/><br/>   
                         </th>
                         <th>
                        <?php
                            for($ii=1; $ii<7;$ii++){
                                echo "<table id='num_TQ$ii' name='num_TQ' class='num_quest$ii'>
                                        <tr>
                                            <th></th>
                                            <th>";
                                            echo "<select name='num_TQuest$ii' id='num_TQuest$ii' style='max-width: 250px;'>";
                                            echo "<option>- - - Choisissez la question - - -</option>";
                                            echo "</select>
                                            </th>
                                       </tr>
                                       <tr>
                                            <th></th>
                                            <th>
                                    
                                                <p class = 'boutons'>
                                                    <input id='add$ii' value='+ Ajouter' type='button' onclick='ajout_q$ii();'/>
                                                </p>
                                            </th>
                                        </tr> 
                                    </table>";
                                    }
                        ?>
                        <br/><br/>
                        </th>
                      </tr>
                </table>
                    
        
          <!--Envoi et annulation-->
            <p class='boutons'>
                <input value='Valider' type='submit'/>
                <input value='Annuler' type='reset' />
            </p>
       </div>
    </form>
             
    <script>
        //-----------------------création du javascript de vérification-------------------------
        function trait_form(){
            validation_cat();
            var libelle = document.getElementById('libelle_test');
            var valeur= libelle.value;
            var nb_lettre = valeur.length;
            var tooltip1 = document.getElementById('tooltipLib');
            if (nb_lettre > 0){
                tooltip1.style.display='block';
            }
        }
        

        function validation_cat(){
            var libelle = document.getElementById('libelle_cat');
            var valeur= libelle.value;
            var nb_lettre = valeur.length;
            var tooltip = document.getElementById('tooltipLibelle');
            if (nb_lettre == 0){
                libelle.className='incorrect';
                tooltip.style.display="inline-block";
            } else {
                libelle.className='correct';
                tooltip.style.display='none';
            }
        }

        function validation_rep(){
            var libelle = document.getElementById('libelle_rep');
            var valeur= libelle.value;
            var nb_lettre = valeur.length;
            var tooltipQuest = document.getElementById('tooltipQuestion');
            if (nb_lettre == 0){
                libelle.className='incorrect';
                tooltipQuest.style.display="inline-block";
            } else {
                libelle.className='correct';
                tooltipQuest.style.display='none';
            }
        }

        function validation_repf(){
            var libelle = document.getElementById('libelle_repf');
            var valeur= libelle.value;
            var nb_lettre = valeur.length;
            var tooltipQuest = document.getElementById('tooltipQuestion');
            if (nb_lettre == 0){
                libelle.className='incorrect';
                tooltipQuest.style.display="inline-block";
            } else {
                libelle.className='correct';
                tooltipQuest.style.display='none';
            }
        }
//-------------------ajout des questions--------------------------------------- 
        function ajout_q0(){
            var num_quest1 = document.getElementById('num_TQ2');
            num_quest1.style.display = "inline";
            var num_quest01 = document.getElementById("add0");
            num_quest01.style.display = "none";
        }
        
        function ajout_q1(){
            var num_quest2 = document.getElementById('num_TQ2');
            num_quest2.style.display = "inline";
            var num_quest01 = document.getElementById("add1");
            num_quest01.style.display = "none";
        }
        
        function ajout_q2(){
            var num_quest3 = document.getElementById('num_TQ3');
            num_quest3.style.display = "inline";
            var num_quest01 = document.getElementById("add2");
            num_quest01.style.display = "none";
        }
        
        function ajout_q3(){
            var num_quest4 = document.getElementById('num_TQ4');
            num_quest4.style.display = "inline";
            var num_quest01 = document.getElementById("add3");
            num_quest01.style.display = "none";
        }
        
        function ajout_q4(){
            var num_quest5 = document.getElementById('num_TQ5');
            num_quest5.style.display = "inline";
            var num_quest01 = document.getElementById("add4");
            num_quest01.style.display = "none";
            var num_quest02 = document.getElementById("add5");
            num_quest02.style.display = "none";
        }
   // <!-- ---------------------création de l'ajax entre catégorie et test --------------------->

        var affiche_cat = document.getElementById('num_cat');
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange=function(){
            var affiche_test=document.getElementById('num_test');
            if(xhr.readyState==4 && xhr.status==200){
		affiche_test.innerHTML = xhr.responseText;
            }
        }
        
        affiche_cat.onchange = function(){
            var num_cat = affiche_cat.value;
            num_cat = /([0-9]+)/.exec(num_cat);
            num_cat = (RegExp.$1);
            xhr.open('GET','ajaxtestquestion.php?num_cat='+num_cat);
            xhr.send('num_cat='+num_cat);
            xhr1.open('GET','ajaxQuest2.php?num_cat='+num_cat);
            xhr1.send('num_cat='+num_cat);
        }
        
   // <!-- ---------------------création de l'ajax pour afficher les questions dans le cadre --------------------->

        var affiche_test1 = document.getElementById('num_test');
        var xhr2 = new XMLHttpRequest();
        xhr2.onreadystatechange=function(){
            var affiche_quest1=document.getElementById('num_quest1');
            if(xhr.readyState==4 && xhr.status==200){
		affiche_quest1.innerHTML = xhr2.responseText;
            }
        }
        
        affiche_test1.onchange = function(){
            var num_test1 = affiche_test1.value;
            num_test1 = /([0-9]+)/.exec(num_test1);
            num_test1 = (RegExp.$1);
            xhr2.open('GET','ajaxQuest1.php?num_test1='+num_test1);
            xhr2.send('num_test1='+num_test1);
        }
        
   //<!-- ---------------------ajax entre catégorie et questions --------------------->
        var recup_cat = document.getElementById('num_cat');
        var xhr1 = new XMLHttpRequest();
        xhr1.onreadystatechange=function(){
            var affiche_quest1=document.getElementById('num_TQuest1');
            var affiche_quest2=document.getElementById('num_TQuest2');
            var affiche_quest3=document.getElementById('num_TQuest3');
            var affiche_quest4=document.getElementById('num_TQuest4');
            var affiche_quest5=document.getElementById('num_TQuest5');
            var affiche_quest6=document.getElementById('num_TQuest6');
              if(xhr1.readyState==4 && xhr1.status==200){
                  affiche_quest1.innerHTML = xhr1.responseText;
                  affiche_quest2.innerHTML = xhr1.responseText;
                  affiche_quest3.innerHTML = xhr1.responseText;
                  affiche_quest4.innerHTML = xhr1.responseText;
                  affiche_quest5.innerHTML = xhr1.responseText;
                  affiche_quest6.innerHTML = xhr1.responseText;
              }
        }
        
       </script>
   <?php
   $contenu=ob_get_clean();
   require './vue/gabarit.php';
   ?>
    </body>
</html>