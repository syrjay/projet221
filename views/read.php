<?php
  include 'functions.php';
  // pagination vite fait nii
  $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1; // couche contrôle

  $records_per_page = 2; // couche contrôle
?>

<!-- couche présentation -->
  <?=template_header('Read')?>

  <div class="content read">
    <h2>Les Articles</h2>
    <a href="create.php" class="create-contact">Créer Article</a>
    <?php foreach ($categories as $categorie): ?>
      <a href="read.php?id=<?=$categorie['id']?>" class="create-contact"><?=$categorie['libelle']?></a>
    <?php endforeach; ?>
    <table>
          <thead>
              <tr>
                <td>#</td>
                <td>Titre</td>
                <td>Contenu</td>
                <td>Date Création</td>
                <td>Date Modification</td>
                <td>Catégorie</td>
                <td></td>
              </tr>
          </thead>
          <tbody>
              <?php foreach ($articles as $article): ?>
              <tr>
                  <td><?=$article['id']?></td>
                  <td><?=$article['titre']?></td>
                  <td><?=$article['contenu']?></td>
                  <td><?=$article['dateCreation']?></td>
                  <td><?=$article['dateModification']?></td>
                  <td><?=$article['categorie']?></td>
                  <td class="actions">
                      <a href="update.php?id=<?=$article['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                      <a href="delete.php?id=<?=$article['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                  </td>
              </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
    <div class="pagination">
      <?php if ($page > 1): ?>
      <a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
      <?php endif; ?>
      <?php if ($page*$records_per_page < $num_articles): ?>
      <a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
      <?php endif; ?>
    </div>
  </div>

  <?=template_footer()?>