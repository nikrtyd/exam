<?php
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
  <div id="image">
    <img src="<?= $article["Image"] ?>" alt="">
        <h1><?= $article["Name"] ?></h1>  
        <!-- TODO: Link to all items of the same category -->
    <p><?= $article["CatName"] ?></p>
    <div class="reviews">
      <div class="form">
        <textarea id="text" rows="5"></textarea>
        <button id="add_comment">Добавить</button>
      </div>
      <h2>Отзывы:</h2>
      <?php foreach ($reviews as $review): ?>
        <div class="comment">
          <p class="author"><?= $review["Name"] ?></p>  
          <p class="text"><?= $review["Text"] ?></p>
          <p class="date"><?= $review["Post_date"] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <script src="script.js"></script>
  <script src="image.js"></script>
</body>
</html>
