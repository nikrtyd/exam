<?php
namespace Shop;

class Card {
  private $id;
  private $image;
  private $text;

  public function __construct($id, $image, $text) {
    $this->id = $id;
    $this->image = ($image == '') ? 'images/noimage.jpg' : $image;
    $this->text = $text;
  } 

  public function get_html() {
    return "<a href='view.php?id=$this->id' class='card'>" .
             "<img class='card__image' src='$this->image' alt=''>" .
             "<p class='card__title'>$this->text</p>" .
             "<p class='card__id'>Код товара: $this->id</p>" .
           "</a>";
  }
}
?>


<!-- Корзина: добавить после card__id -->
<!-- "<button class='card__add-to-cart'>Добавить в корзину</button>" . -->