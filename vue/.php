<?php 
    $titre='Ajout de catégories, questions et réponses';
    ob_start();
?>
<ul>
    <li><a href='vueAjoutCat.php'>Créer des Catégories</a></li>
    <li><a href='vueAjoutTest.php'>Créer un Test</a></li>
    <li><a href='vueAjoutCat.php'>Créer des Questions</a></li>
    <li><a href='vueAjoutCat.php'>Ajout des Réponses</a></li>   
</ul>
<?php
    $nav=ob_get_clean();
?>