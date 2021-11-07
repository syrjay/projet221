<?php include 'functions.php';?>

<?=template_header('Create')?>

<div class="content update">
	<h2>Create Article</h2>
    <form action="create.php" method="post">
        <label for="titre">Titre</label>
        <input type="text" name="titre" placeholder="titre" id="titre">
        <label for="contenu">Contenu</label>
        <input type="text" name="contenu" placeholder="contenu" id="contenue">
        <label for="phone">Catégorie</label>
        <input type="number" name="categorie" placeholder="categorie" id="categorie">
        <input type="submit" value="Créer">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>