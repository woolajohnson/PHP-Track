<?php 

class Item {
    public $name;
    public $price;
    public $stock;
    public $sold;

    public function __construct($name, $price, $stock) {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->sold = 0;
    }
    public function logDetails() {
        echo $this->name;
        echo $this->price;
        echo $this->stock;
        echo $this->sold;
    }
    public function buy() {
        if($this->stock > 0) {
            echo "Buying <br>";
            $this->sold++;
            $this->stock--;
        } else {
            echo "Item sold out <br>";
        }
        
    }
    public function return() {
        if($this->sold > 0) {
            echo "Returning <br>";
            $this->sold--;
            $this->stock++;
        } else {
            echo "No more items to return <br>";
        }
        
    }
}

$item1 = new Item("shoes", 12, 8);
$item1->buy();
$item1->buy();
$item1->buy();
$item1->return();
$item1->logDetails();

$item2 = new Item("bag", 23, 11);
$item2->buy();
$item2->buy();
$item2->return();
$item2->return();
$item2->logDetails();

$item3 = new Item("watch", 18, 7);
$item3->return();
$item3->return();
$item3->return();
$item3->logDetails();
?>