<?php
  include 'models/functions.php';

  function list_articles() {
    $articles = get_articles();
    $categories = get_categories();
    require_once('views/read.php');
  }

  function create() {
    create_article();
    require_once('views/create.php');
  }

  function update() {
    update_article();
    require_once('views/update.php');
  }
?>