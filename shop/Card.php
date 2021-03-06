<?php

namespace Shop;

class Card
{
  private $id;
  private $image;
  private $name;
  private $price;

  public function __construct($id, $image, $name, $price)
  {
    $this->id = $id;
    $this->image = ($image == '') ? 'images/noimage.jpg' : $image;
    $this->name = $name;
    $this->price = $price;
  }

  public function get_html()
  {
    return "<a href='view.php?id=$this->id' class='card'>" .
      "<img class='card__image' src='$this->image' alt=''>" .
      "<p class='card__title'>$this->name</p>" .
      "<p class='card__id'>Код товара: $this->id</p>" .
      "<p class='card__price'>Цена: <b>$this->price тг.</b></p>" .
      "</a>";
  }
}
?>


<!-- Корзина: добавить после card__id -->
<!-- "<button class='card__add-to-cart'>Добавить в корзину</button>" . -->
