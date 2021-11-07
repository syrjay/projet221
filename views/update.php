<?php
include 'functions.php';
?>

<?=template_header('Read')?>

<div class="content update">
	<h2>Modification de  l'article <?=$article['id']?></h2>
    <form action="update.php?id=<?=$article['id']?>" method="post">
        <label for="titre">Titre</label>
        <input type="text" name="titre" placeholder="titre" value="<?=$article['titre']?>" id="titre">
        <label for="contenu">Contenu</label>
        <input type="text" name="contenu" placeholder="lorem" value="<?=$article['contenu']?>" id="contenu">
        <label for="created">Date de Création</label>
        <input type="datetime-local" name="dateCreation" value="<?=date('Y-m-d\TH:i', strtotime($article['dateCreation']))?>" id="dateCreation">
        <label for="created">Date de Modification</label>
        <input type="datetime-local" name="dateModification" value="<?=date('Y-m-d\TH:i', strtotime($article['dateModification']))?>" id="dateModification">
        <label for="categorie">Catégorie</label>
        <input type="number" name="categorie" placeholder="1" value="<?=$article['categorie']?>" id="categorie">
        <input type="submit" value="Valider">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>