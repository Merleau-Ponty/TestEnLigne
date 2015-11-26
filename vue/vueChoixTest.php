<?php 
    $titre='Choix du test';
    ob_start();
?>
    <!-- Formulaire d'ajout de catégorie -->
    <form name='form' method='post' action='indexDoTest.php'>
        <div  class='form' >
            <?="<h2>$titre</h2>"?>
            <table>
                <tr>
                    <!--Choix de la catégorie-->
                    <th>
                        <label class='text_texteArea' for="categorie">Choisissez la catégorie du test : </label>
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
                    <!--Choix du test-->
                    <th>
                        <label class='text_texteArea' for="categorie">Choisissez le test: </label>
                        <br /><br />
                    </th>
                    <th>
                        <?php
                            echo "<select name='num_test' id='num_test' style='width: 250px;' >";
                            echo "<option value=''> - - - Choisissez un test - - -</option></select>";
                        ?>
                        <br /><br />
                    </th>
                </tr>
            </table>
            <!--Envoi et annulation-->
            <p class='boutons'>
                <input value='Effectuer' type='submit'/>
                <input value='Annuler' type='reset'/>
            </p>
        </div>
    </form>   
    <script>
        //Ajax Pour afficher les questions suivant la catégorie
        var listeCat = document.getElementById('num_cat2');
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange=function(){
		var listeTest=document.getElementById('num_test');
		if(xhr.readyState==4 && xhr.status==200){
			listeTest.innerHTML=xhr.responseText;
		}
	}
        
	listeCat.onchange=function(){
		var num_cat2 = listeCat.value;
                num_cat2= /([0-9]+)/.exec(num_cat2);
                num_cat2 = (RegExp.$1);
		xhr.open('GET','ajaxTest.php?num_cat2='+num_cat2);
		xhr.send('num_cat2='+num_cat2);
	}
    </script>
<?php
    $contenu=ob_get_clean();
    require 'gabarit.php';
?>