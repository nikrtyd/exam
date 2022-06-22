<?php
session_start();
$user_id = $_SESSION["user_id"] ?? false;
require "vendor/autoload.php";
$db = new Shop\DB();
$articles = $db->get_all_articles();
$promotions = $db->get_all_promotions();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Главная</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="media.css">
</head>

<body>
  <?php include "header.php" ?>
  <h1>Все товары</h1>
  <div id="grid">
    <?php foreach ($articles as $card) : ?>
      <?= (new Shop\Card($card["Id"], $card["Image"], $card["Text"]))->get_html() ?>
    <?php endforeach; ?>
  </div>
  <div id="popup_photo">
    <img src="" alt="">
  </div>
  <script src="script.js"></script>
</body>

</html>
