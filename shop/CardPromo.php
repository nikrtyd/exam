<?php

namespace Shop;

class CardPromo extends Card
{
  private $id;
  private $image;
  private $text;
  private $price;
  private $new_price;

  public function __construct($id, $image, $text, $price, $new_price)
  {
    $this->id = $id;
    $this->image = ($image == '') ? 'images/noimage.jpg' : $image;
    $this->text = $text;
    $this->price = $price;
    $this->new_price = $new_price;
  }

  public function get_html()
  {
    return "<a href='view.php?id=$this->id' class='card'>" .
      "<img class='card__image' src='$this->image' alt=''>" .
      "<p class='card__title'>$this->text</p>" .
      "<p class='card__id'>Код товара: $this->id</p>" .
      "<p class='card__old_price'>Цена: <del>$this->price</del></p>" .
      "<p class='card__new_price'><b>$this->new_price тг.</b></p>" .
      "</a>";
  }
}
?>


<!-- Корзина: добавить после card__id -->
<!-- "<button class='card__add-to-cart'>Добавить в корзину</button>" . -->
