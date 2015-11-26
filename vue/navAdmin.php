<?php 
    $titre='Ajout de catégories, questions et réponses';
    ob_start();
?>
<!-- Menu Admin -->
<ul>
    <li>
        <a href='indexAdd.php'>
            <h3>Créer des Catégories</h3>
            </a>
    </li>
    <li>
        <a href='indexTest.php'>
            <h3>Créer un Test</h3>
        </a>
    </li>
    <li>
        <a href='indexAdd.php#questions'>
            <h3>Créer des Questions</h3>
        </a>
    </li>
    <li>
        <a href='indexAdd.php#reponses'>
            <h3>Ajout des Réponses</h3>
        </a>
    </li>
    <li>
        <a href='indexDroit.php'>
            <h3>Modifier les droits d'administation</h3>
        </a>
    </li>
    <li>
        <a href='indexChoixTest.php'>
            <h3>Effectuer un test</h3>
        </a>
    </li>
</ul>
<?php
    $nav=ob_get_clean();
?>