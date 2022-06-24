<?php

use function Composer\Autoload\includeFile;

session_start();
$is_admin = $_SESSION["is_admin"] ?? false;
$user_id = $_SESSION["user_id"] ?? false;
$article_id = intval($_GET["id"]);
require "vendor/autoload.php";
$db = new \Shop\DB();
$article = $db->get_article_by_id($article_id);
$reviews = $db->get_article_reviews($article_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <title>Фото</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="media.css">
</head>

<body>
  <?php include "header.php"; ?>
  <div id="article">
    <?php if ($is_admin) : ?>
      <img src="<?= $article["Image"] ?>" alt="">
      <div class="container">
        <h3>Изменить фото:</h3>
        <input type="file">
        <h3 class="change">Изменить название:</h3>
        <h1 class="article__name"><?= $article["Name"] ?></h1>
        <h3 class="change">Изменить цену:</h3>
        <h2 class="article__price"><?= $article["Price"] ?></h2>
        <h3 class="change">Изменить описание:</h3>
        <p class="article__desc"><?= $article["Description"] ?></p>
        <h3 class="change">Изменить кол-во покупок:</h3>
        <p class="article__purchases"><?= $article["Purchases"] ?></p>
        <button class="save_changes">Сохранить изменения</button>
      </div>
    <?php endif; ?>
    <?php if (!$is_admin) : ?>
      <h1>Вы не обладаете всеми полномочиями администратора.</h1>
    <?php endif; ?>
  </div>
  <?php include "error.php" ?>
  <script src="script.js"></script>
  <script src="article.js"></script>
  <script>
    let inputfile  = document.querySelector('input[type=file]');
    inputfile.addEventListener('')
    let button_save = document.querySelector('.save_changes');
    button_save.addEventListener('click', () => {
      
    })
  </script>
</body>

</html>
