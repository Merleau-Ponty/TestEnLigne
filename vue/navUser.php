<?php 
    $titre='Ajout de catégories, questions et réponses';
    ob_start();
?>
<!-- Menu Utilisateur -->
<ul>
    <li>
        <a href='indexEspaceUser.php'>
            <h3>Espace Utilisateur</h3>
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