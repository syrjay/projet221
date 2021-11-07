<?php
require_once './controllers/controller.php';
require_once './models/functions.php';

  if (!isset($_GET['action'])){
    list_articles();
  }else{
    if(isset($_GET['action'])) {
      switch ($_GET['action']) {
        case '/read':
          list_articles();
          break;
        case '/create':
          create();
          break;
        case '/update':
          create();
          break;
        default:
          list_articles();
          break;
      }
    }
  }

?>