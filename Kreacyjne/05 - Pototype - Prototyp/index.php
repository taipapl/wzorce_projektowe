<?php

declare(strict_types=1);

class Pizza
{

    protected $rozmiar;
    protected $cena;

    public function __construct($rozmiar, $cena)
    {
        $this->rozmiar = $rozmiar;
        $this->cena = $cena;
    }

    public function getSize()
    {
        return $this->rozmiar;
    }

    public function setSize($rozmiar)
    {
        $this->rozmiar = $rozmiar;
    }


    public function getCena()
    {
        return $this->cena;
    }

    public function setCena($cena)
    {
        $this->cena = $cena;
    }
}

// wzorzec polega na sklonowaniu obiektu będącego wzorcem czyli 
// posiadającego juz parametry które te mogą być juz ustawione

$pizza = new Pizza(30, 39.99);

$clonPizzy = clone $pizza;


print_r($pizza);
echo '<br><br>';
$clonPizzy->setCena(22.89);
$clonPizzy->setSize(12);
print_r($clonPizzy);