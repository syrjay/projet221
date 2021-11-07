<?php
  function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'mglsi_news';
    try {
      return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
      // si il y a erreur on arrête l'exécution
      exit('Failed to connect to database!');
    }
  }

  function get_list($table_name) {
    $connexion = pdo_connect_mysql();
    $req = $connexion->prepare('SELECT * FROM '.$table_name);
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
  }

  function get_articles() {
    return get_list('Article');
  }
  function get_categories() {
    return get_list('Categorie');
  }

  function create_article() {
    $connexion = pdo_connect_mysql();
    $msg = '';

    if (!empty($_POST)) { // controle
      // service/controle
      $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
      $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';
      $dateCreation = date('Y-m-d H:i:s');
      $dateModification =  date('Y-m-d H:i:s');
      $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : 0;
      
      // insertion
      // persistance
      $stmt = $pdo->prepare('INSERT INTO Article(titre, contenu, dateModification, dateCreation, categorie) VALUES (?, ?, ?
      , ?, ?)');
      $stmt->execute([$titre, $contenu, $dateCreation, $dateModification, $categorie]);
      // message de succès
      $msg = 'l\'article a bien été créé!';

    }
  }

  function update_article() {
    $connexion = pdo_connect_mysql();
    $msg = '';

    if (isset($_GET['id'])) {
      if (!empty($_POST)) {
  
          $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
          $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';
          $dateCreation = isset($_POST['dateCreation']) ? $_POST['dateCreation'] : date('Y-m-d H:i:s');
          $dateModification = isset($_POST['dateModification']) ? $_POST['dateModification'] : date('Y-m-d H:i:s');
          $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';
          
          $stmt = $pdo->prepare('UPDATE Article SET titre = ?, contenu = ?, dateCreation = ?, dateModification = ?, categorie = ? WHERE id = ?');
          $stmt->execute([$titre, $contenu, $dateCreation, $dateModification, $categorie, $_GET['id']]);
          $msg = 'Article bien mis à jour !';
          header('Location: read.php');
      }
  
      $stmt = $pdo->prepare('SELECT * FROM Article WHERE id = ?');
      $stmt->execute([$_GET['id']]);
      $article = $stmt->fetch(PDO::FETCH_ASSOC);
      if (!$article) {
          exit('Article inéxistant');
      }
    }else {
      exit('aucun id spécifié');
    }
  }
?>