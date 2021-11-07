<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// vérifier si cet article exist
if (isset($_GET['id'])) {
    // récupérer l'article à supprimer
    $stmt = $pdo->prepare('SELECT * FROM Article WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$article) {
        exit('Aucun article ne correspond à cet id');
    }
    // être sur que l'utilisateur confirme avant suppression
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // si il clic sur oui on supprime
            $stmt = $pdo->prepare('DELETE FROM Article WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'Article supprimé!';
        } else {

            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('id non spécifié');
}
?>

<?=template_header('Delete')?>

<div class="content delete">
	<h2>Supprimé l'article #<?=$article['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Êtes-vous sur de vouloir supprimé cet article <?=$article['id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$article['id']?>&confirm=yes">Oui</a>
        <a href="delete.php?id=<?=$article['id']?>&confirm=no">Non</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>