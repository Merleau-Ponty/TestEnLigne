<?php 
    $titre='Ajout de catégories, questions et réponses';
    ob_start();
?>
    <!-- Formulaire d'ajout de catégorie -->
    <form name='form' method='post' action='indexAdd.php'>
        <div  class='form' >
            <h2>Ajout de catégories</h2>
            <table>
                <tr>
                    <th>
                        <label for=''>Catégories existantes :</label>
                    </th>
                    <td>
                        <?php
                        $affiche_cat=getAfficheCat();
                        $max=count($affiche_cat);
                        echo "<select name='cat' id='cat' style='width: 300px;' size='5' >";
                        for($i=0;$i!=$max;$i++){
                            $ligne = $affiche_cat[$i];
                            echo "<option>";
                            echo $ligne['libelle_cat'];
                            echo"</option>";
                        }
                        echo "</select><br/><br/>"
                        ?>
                    <td>
                </tr>
                <tr>
                    <th>
                        <label for='libelle_cat'>Entrez le libelle de la catégorie :</label>
                    </th>
                    <th>
                        <input class='verification' name='libelle_cat' id='libelle_cat' size='50' type='text'  onblur='validation_cat();' />
                    </th>
                </tr>
            </table>
            <span class='tooltip' id='tooltipLibelle' >* Champ obligatoire</span>
            <span class='tooltip1' id='tooltipLib' >La Catégorie a bien été enregistrée</span>
            <!--Envoi et annulation-->
            <p class='boutons'>
                <input value='Valider' type='submit' onclick='trait_form();'/>
                <input value='Annuler' type='reset' onfocus='trait_form();'/>
            </p>
        </div>
    </form>    
    
    <!-- Formulaire de création de questions et de leurs réponses -->
    <form name='form' method='post' action='indexAdd.php'>
        <div class='form' id="questions" >
            <h2>Ajout d'une question et de ses réponse</h2>
            <table>
                <tr>
                    <!--Choix de la catégorie-->
                    <th>
                        <label class='text_texteArea' for="categorie">Choisissez la catégorie de la question : </label>
                        <br /><br />
                    </th>
                    <th>
                        <?php
                            $affiche_cat=  getAfficheCat();
                            $max=count($affiche_cat);
                            echo "<select id='num_cat1' name='num_cat1'>";
                            echo "<option> - - - Choisissez une catégorie - - -";
                            for($i=0;$i!=$max;$i++){
                                $ligne = $affiche_cat[$i];
                                echo "<option>";
                                echo $ligne['num_cat'],' ',$ligne['libelle_cat'];
                            }
                            echo "</option></select>";
                        ?>
                        <br /><br />
                    </th>
                </tr>
                <tr>
                    <!--Choix de la catégorie-->
                    <th>
                        <label class='text_texteArea' for="categorie">Questions existantes : </label>
                        <br /><br />
                    </th>
                    <th>
                        <select name='quest_ex' id='quest_ex' style='width: 300px;' size='4' >
                            <option> - - - Acune questions existantes - - -</option>
                        </select>
                        <br /><br />
                    </th>
                </tr>
                <tr>
                    <th>
                        <label class='text_texteArea' for='libelle_quest'>Entrez le libelle de la question :</label>
                    </th>
                    <th>
                        <textarea class='verification' name='libelle_quest' id='libelle_quest' cols='51' rows='5' maxlength='255' type='text' onblur='validation_quest();'></textarea>                    <br /><br/>
                    </th>
                </tr>
                <tr>
                    <th>
                        <label for='libelle_quest'>Entrez une réponse :</label>
                    </th>
                    <th>
                        <input class='verification' name='libelle_repo0' id='libelle_repo0' size='50' type='text'  onblur='validation_rep();' />
                        <br />
                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th class='juste'>
                        <label><input name='juste0' id='juste0' type='radio' value='0' onblur='validation_promo();' checked/>Juste</label>
                        <label><input name='juste0' id='juste0' type='radio' value='1' onblur='validation_promo();' />Fausse</label>
                        <br/><br/>
                    </th>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p class='boutons'>
                            <input id="add0" value='+ Ajouter' type='button' onclick='ajout_qr();'/>
                        </p>
                    </td>
                </tr>
            </table>
            <?php
                for($i=1;$i<5;$i++){
                    echo "
                    <table id='maTable$i'>
                        <tr>
                            <th></th>
                            <th>
                                <input class='verification' name='libelle_repo$i' id='libelle_repo$i' size='50' type='text'  onblur='validation_rep();' />
                                <br />
                            </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th class='juste'>
                                <label><input name='juste$i' id='juste$i' type='radio' value='0' onblur='validation_promo();' checked/>Juste</label>
                                <label><input name='juste$i' id='juste$i' type='radio' value='1' onblur='validation_promo();' />Fausse</label>
                                <br/><br/>
                            </th>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <p class='boutons'>
                                    <input id='add$i' value='+ Ajouter' type='button' onclick='ajout_qr$i();'/>
                                </p>
                            </td>
                </tr>
                    </table>";
                }
            ?>
            <table>
                <tr>
                    <th>
                        <label class='text_texteArea' for='form_col' >Type de sélection des réponses</label>
                    </th>
                    <th class='type_selec'>
                        <label><input name='type_selec' id='type_selec' type='radio' value='0' onblur='validation_promo();' checked/>bouton radio</label>
                        <label><input name='type_selec' id='type_selec' type='radio' value='1' onblur='validation_promo();' />Case à cocher</label>
                    </th>
                </tr>
            </table>
            <span class='tooltipQuest' id='tooltipQuestion' >* Champ obligatoire</span>
            <p class='tooltip1' id='tooltipLib' >La question et sa réponse ont bien été enregistrées</p>
            
            <!--Envoi et annulation-->
            <p class='boutons'>
                <input value='Valider' type='submit' onfocus='test();'/>
                <input value='Annuler' type='reset' onfocus='trait_form();'/>
            </p>
        </div>
    </form>
    <!-- Formulaire de création de questions et de leurs réponses -->
    <form name='form' method='post' action='indexAdd.php'>
        <div class='form' id="reponses" >
            <h2>Ajout de réponses</h2>
            <table>
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
                            echo "<select name='num_cat1' id='num_cat2' style='width: 250px;' >";
                            echo "<option value=''> - - - Choisissez une catégorie - - -";
                            for($i=0;$i!=$max;$i++){
                                $ligne = $affiche_cat[$i];
                                echo "<option >";
                                echo $ligne['num_cat'],' ',$ligne['libelle_cat'];
                            }
                            echo "</option></select>";
                        ?>
                        <br/><br/>
                    </th>
                </tr>
                <tr>
                    <!--Choix de la question-->
                    <th>
                        <label class='text_texteArea' for="categorie">Choisissez la question pour le réponse : </label>
                        <br /><br />
                    </th>
                    <th>
                        <?php
                            echo "<select name='num_quest1' id='num_quest1' style='width: 250px;' >";
                            echo "<option value=''> - - - Choisissez une question - - -</option></select>";
                        ?>
                        <br /><br />
                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th>
                        <?php
                            echo "<select name='num_rep1' id='num_rep1' style='width: 300px;' size='4' >";
                            echo "<option value=''> - - - Réponses inexistantes - - -</option></select>";
                        ?>
                        <br/><br/>
                    </th>
                </tr>
                <tr>
                    <th>
                        <label for='libelle_quest'>Entrez vos réponses :</label>
                    </th>
                    <?php
                        for($ii=0;$ii!=5;$ii++){
                            echo "<tr>
                                    <th></th>
                                    <th>
                                        <input class='verification' name='libelle_rep$ii' id='libelle_rep$ii' size='50' type='text'  onblur='validation_rep();' />
                                        <br />
                                    </th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th class='juste'>
                                        <label><input name='juste$ii' id='juste' type='radio' value='0' onblur='validation_promo();' checked/>Juste</label>
                                        <label><input name='juste$ii' id='juste' type='radio' value='1' onblur='validation_promo();' />Fausse</label>
                                        <br/><br/>
                                    </th></tr>
                                    "; 
                            }
                        ?>
                <tr>
            </table>
            <span class='tooltipQuest' id='tooltipQuestion' >* Champ obligatoire</span>
            <p class='tooltip1' id='tooltipLib' >La question et sa réponse ont bien été enregistrées</p>
            
            <!--Envoi et annulation-->
            <p class='boutons'>
                <input value='Valider' type='submit'/>
                <input value='Annuler' type='reset'/>
            </p>
        </div>
    </form>
    <script>
        //Ajax Pour afficher les questions suivant la catégorie
        var listeCat = document.getElementById('num_cat2');
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange=function(){
		var listeQuest=document.getElementById('num_quest1');
		if(xhr.readyState==4 && xhr.status==200){
			listeQuest.innerHTML=xhr.responseText;
		}
	}
        
	listeCat.onchange=function(){
		var num_cat2 = listeCat.value;
                num_cat2= /([0-9]+)/.exec(num_cat2);
                num_cat2 = (RegExp.$1);
		xhr.open('GET','ajaxQuest.php?num_cat2='+num_cat2);
		xhr.send('num_cat2='+num_cat2);
	}
              
        //Ajax Pour afficher les les réponses suivant la question
        var listeQuest1 = document.getElementById('num_quest1');
        var xhr1 = new XMLHttpRequest();
        xhr1.onreadystatechange=function(){
            var listeRep=document.getElementById('num_rep1');
            if(xhr1.readyState==4 && xhr1.status==200){
                    listeRep.innerHTML=xhr1.responseText;
            }
        }

        listeQuest1.onchange=function(){
            var num_quest2 = listeQuest1.value;
            num_quest2= /([0-9]+)/.exec(num_quest2);
            num_quest2 = (RegExp.$1);
            xhr1.open('GET','ajaxRep.php?num_quest2='+num_quest2);
            xhr1.send('num_quest2='+num_quest2);
        }
        
        //Ajax Pour afficher les questions suivant la catégorie
        var listeCat1 = document.getElementById('num_cat1');
	var xhr2 = new XMLHttpRequest();
	xhr2.onreadystatechange=function(){
		var listeQuest1=document.getElementById('quest_ex');
		if(xhr2.readyState==4 && xhr2.status==200){
			listeQuest1.innerHTML=xhr2.responseText;
		}
	}
        
	listeCat1.onchange=function(){
		var num_cat2 = listeCat1.value;
                num_cat2= /([0-9]+)/.exec(num_cat2);
                num_cat2 = (RegExp.$1);
		xhr2.open('GET','ajaxCQ.php?num_cat2='+num_cat2);
		xhr2.send('num_cat2='+num_cat2);
	}
        
        function trait_form(){
            validation_cat();
            var libelle = document.getElementById('libelle_cat');
            var valeur= libelle.value;
            var nb_lettre = valeur.length;
            var tooltip1 = document.getElementById('tooltipLib');
            if (nb_lettre > 0){
                tooltip1.style.display='block';
            }
        }

        function trait_form_quest(){
            validation_quest();
            validation_rep();
            validation_repf();
            test();
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

        function validation_quest(){
            var libelle = document.getElementById('libelle_quest');
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

        function ajout_qr(){
            var test1 = document.getElementById('maTable1');
            test1.style.display="inline-block";
            var test2 = document.getElementById('add0');
            test2.style.display='none';
        }
        
        function ajout_qr1(){
            var test1 = document.getElementById('maTable2');
            test1.style.display="inline-block";
            var test2 = document.getElementById('add1');
            test2.style.display='none';
        }
        
        function ajout_qr2(){
            var test1 = document.getElementById('maTable3');
            test1.style.display="inline-block";
            var test2 = document.getElementById('add2');
            test2.style.display='none';
        }
        
        function ajout_qr3(){
            var test1 = document.getElementById('maTable4');
            test1.style.display="inline-block";
            var test2 = document.getElementById('add3');
            test2.style.display='none';
            var test3 = document.getElementById('add4');
            test3.style.display='none';
        }
    </script>
<?php
    $contenu=ob_get_clean();
    require 'gabarit.php';
?>