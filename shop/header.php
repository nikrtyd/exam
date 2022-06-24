<header>
  <div class="container">
    <a class="desktop_logo" href="index.php">
      <img src="images/Coca-Cola_logo.svg" alt="">
</a>
    <div class="popup">
      <a href="index.php">Главная</a>
      <?php if ($user_id) : ?>
        <a href="logout.php">Выйти из аккаунта</a>
      <?php endif; ?>
      <?php if (!$user_id) : ?>
        <a href="user.php">Войти</a>
      <?php endif; ?>
    </div>
    <div class="mobile">
      <a class="mobile_logo" href="index.php">
        <img src="images/Coca-Cola_logo.svg" alt="">
      </a>
      <div class="mobile_icon">
        <img src="menu.png" alt="">
      </div>
    </div>
  </div>
</header>
