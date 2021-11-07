<?php
function template_header($title) {
  echo <<<EOT
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>$title</title>
      <link href="../assets/style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
      <nav class="navtop">
        <div>
          <h1>Oumar et les articles de Diop</h1>
            <a href="index.php"><i class="fas fa-home"></i>Accueil</a>
            <a href="read.php"><i class="fas fa-address-book"></i>Articles</a>
        </div>
      </nav>
  EOT;
}

  function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
  }
?>