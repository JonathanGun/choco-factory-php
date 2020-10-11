<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style type="text/css">
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap");
    </style>
    <link rel="stylesheet" type="text/css" href="/public/css/variables.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/base.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/util.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/grid.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/card.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/form.css" />
    <link rel="stylesheet" type="text/css" href="/public/css/table.css" />
    <script src="/public/js/ajax.js"></script>
    <title><?=$this->title ?? 'A-Chong-co'?></title>
  </head>

  <body>
    <?php
if ($this->content_file) {
    include $this->content_file;
} else {
    echo "<div class='container'>";
    if ($this->content) {
        echo $this->content;
    } else {
        include ERROR_PATH . '500.php';
    }
    echo '<a class="btn float-right mt-5 mb-3" href="/">Return to dashboard</a>';
    echo "</div>";
}?>
  </body>
</html>
