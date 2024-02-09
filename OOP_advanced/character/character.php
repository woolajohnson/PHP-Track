<?php 
class Character {
    public $name;
    public $health;
    public $stamina;
    public $mana;
    
    public function __construct($name) {
        $this->name = $name;
        $this->health = 100;
        $this->stamina = 100;
        $this->mana = 100;
    }

    public function walk() {
        $this->stamina--;
    }
    public function run() {
        $this->stamina -= 3;
    }
    public function showStats() {
        echo "{$this->name} <br>";
        echo "{$this->health} <br>";
        echo "{$this->stamina} <br>";
        echo "{$this->mana} <br>";
    }
}

$character = new Character("character");
$character->walk();
$character->walk();
$character->walk();
$character->run();
$character->run();
$character->showStats();

class Shaman extends Character {

    public function __construct($name) {
        parent::__construct($name);
        $this->health = 150;
    }
    
    public function heal() {
        $this->health += 5;
        $this->stamina += 5;
        $this->mana += 5;
    }
}

$shaman = new Shaman("shaman");
$shaman->walk();
$shaman->walk();
$shaman->walk();
$shaman->run();
$shaman->run();
$shaman->heal();
$shaman->showStats();

class Swordsman extends Character {

    public function __construct($name) {
        parent::__construct($name);
        $this->health = 170;
    }

    public function slash() {
        $this->mana -= 10;
    }
    public function showStats() {
        echo "I am powerful! <br>";
        parent::showStats();
    }
}

$swordsman = new Swordsman("swordsman");
$swordsman->walk();
$swordsman->walk();
$swordsman->walk();
$swordsman->run();
$swordsman->run();
$swordsman->slash();
$swordsman->slash();
$swordsman->showStats();
?>