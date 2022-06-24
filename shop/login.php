<?php
if (isset($_POST["login"], $_POST["password"])) {
  require "vendor/autoload.php";
  $db = new \Shop\DB();
  $user_info = $db->check_user($_POST["login"], $_POST["password"]);
  if (!$user_id) {
    session_start();
    $_SESSION["user_id"] = $user_info[0];
    $_SESSION["is_admin"] = $user_info[1];
    header("Location: index.php");
  } else {
    header("Location: user.php?error=login");
  }
}
