<?php

use function Composer\Autoload\includeFile;

session_start();
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
    <img src="<?= $article["Image"] ?>" alt="">
    <div class="container">
      <h1 class="article__name"><?= $article["Name"] ?></h1>
      <h2 class="article__price">Цена: <?= $article["Price"] ?> тг.</h2>
      <p class="article__desc"><?= $article["Description"] ?></p>
      <!-- TODO: Link to all items of the same category -->
      <a class="article__view-more" href="#">Просмотреть все товары категории <?= $article["CatName"] ?></a>
      <div class="article__add-review">
        <h2>Добавить отзыв о товаре:</h2>
        <div class="article__form">
          <textarea class="article__textarea form__textarea" id="text" rows="5"></textarea>
          <button id="add_comment">Добавить</button>
        </div>
        <div class="article__reviews">
          <h2>Отзывы:</h2>
          <?php
          if ($reviews == []) { ?>
            <div>Пока нет отзывов. Добавьте свой!</div>
          <?php } else
            foreach ($reviews as $review) : ?>
            <div class="comment">
              <p class="author"><?= $review["Name"] ?></p>
              <p class="text"><?= $review["Text"] ?></p>
              <p class="date"><?= $review["Post_date"] ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <?php include "error.php" ?>
  <script src="script.js"></script>
  <script src="article.js"></script>
</body>

</html>
