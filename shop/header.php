<header>
  <div class="popup">
    <a href="index.php">Главная</a>
    <?php if ($user_id) : ?>
      <a id="show_add_photo" href="#">Добавить фото</a>
      <a href="user.php">Ваши посты</a>
      <a href="logout.php">Выйти</a>
    <?php endif; ?>
    <?php if (!$user_id) : ?>
      <a href="user.php">Войти</a>
    <?php endif; ?>
  </div>
  <div class="mobile_icon">
    <img src="menu.png" alt="">
  </div>
</header>

<?php include "add_form.php" ?>
