<?php 

class House {
    public $location;
    public $price;
    public $lot;
    public $type;
    public $discount;
    public $total;

    public function __construct($location, $price, $lot, $type) {
        $this->location = $location;
        $this->price = $price;
        $this->lot = $lot;
        $this->type = $type;

        if($this->type == "Pre-selling") {
            $this->discount = 0.2;
            $this->total = $this->price - ($this->discount * $this->price);
        } else {
            $this->discount = 0.05;
            $this->total = $this->price - ($this->discount * $this->price);
        }

        $this->show_all();
    }

    public function show_all() {
        echo "Location: " . $this->location . "<br>";
        echo "Price: " . $this->price . "<br>";
        echo "Lot: " . $this->lot . "<br>";
        echo "Type: " . $this->type . "<br>";
        echo "Discount: " . $this->discount . "<br>";
        echo "Total Price: " . $this->total . "<br>";
    }
}

$house1 = new House("La Union", 1500000, "100sqm", "Pre-selling");
$house2 = new House("Metro Manila", 1000000, "150sqm", "Ready for Occupancy");
?>