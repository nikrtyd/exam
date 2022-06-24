<?php

namespace Shop;

use mysqli;

class DB
{
  static $host = 'localhost';
  static $user = 'root';
  static $password = '';
  static $database = 'photodb';

  public function __construct()
  {
    $this->link = new mysqli(DB::$host, DB::$user, DB::$password, DB::$database);
    $this->link->set_charset('utf8');
  }

  public function get_all_entries($query)
  {
    $sql_result = $this->link->query("SELECT * FROM `$query` ORDER BY `Purchases` DESC");
    if ($sql_result->num_rows) {
      return $sql_result->fetch_all(MYSQLI_ASSOC);
    }
    return [];
  }

  public function get_user_photos($uid)
  {
    $sql_result = $this->link->query("SELECT * FROM ` ` WHERE `Uid` = '$uid' ORDER BY `Id` DESC");
    if ($sql_result->num_rows) {
      return $sql_result->fetch_all(MYSQLI_ASSOC);
    }
    return [];
  }

  public function check_user($login, $password)
  {
    $sql_result = $this->link->query("SELECT * FROM `users` WHERE `Email` = '$login' AND `Password` = '$password'");
    if ($sql_result->num_rows) {
      $user = $sql_result->fetch_assoc();
      return [$user["Id"], $user["IsAdmin"]];
    }
    return false;
  }

  public function check_login($login)
  {
    $sql_result = $this->link->query("SELECT * FROM `users` WHERE `Email` = '$login'");
    if ($sql_result->num_rows) {
      return true;
    }
    return false;
  }

  public function new_user($login, $password)
  {
    $this->link->query("INSERT INTO `users` (`Name`, `Password`, `Email`) VALUES ('', '$password', '$login')");
  }

  public function new_photo($uid, $image, $text)
  {
    $this->link->query("INSERT INTO `photos` (`Uid`, `Image`, `Text`, `Tags`) VALUES ('$uid', '$image', '$text', '')");
  }

  public function get_article_by_id($article_id)
  {
    $sql_result = $this->link->query("SELECT `a`.*, 
  `c`.`CatName` FROM `articles` `a` LEFT JOIN `categories` `c` ON `a`.`Category` = `c`.`Id` WHERE `a`.`Id` = '$article_id'");
    if ($sql_result->num_rows) {
      return $sql_result->fetch_assoc();
    }
    return false;
  }

  public function get_article_reviews($article_id)
  {
    $sql_result = $this->link->query("SELECT `r`.*, `u`.`Name` FROM `reviews` `r` LEFT JOIN `users` `u` ON `u`.`Id` = `r`.`Uid` WHERE `r`.`Aid` = '$article_id' ORDER BY `Id` DESC");
    if ($sql_result->num_rows) {
      return $sql_result->fetch_all(MYSQLI_ASSOC);
    }
    return [];
  }

  public function add_comment($pid, $uid, $text)
  {
    $date = date('Y-m-d');
    $this->link->query("INSERT INTO `reviews` (`Pid`, `Uid`, `Text`, `Post_date`) VALUES ('$pid', '$uid', '$text', '$date')");
    $last_id = $this->link->insert_id;
    $inserted_comment = $this->link->query("SELECT `r`.*, `u`.`Name` FROM `reviews` `r` LEFT JOIN `users` `u` ON `u`.`Id` = `r`.`Uid` WHERE `r`.`Id` = '$last_id'");
    return $inserted_comment->fetch_assoc();
  }
}
