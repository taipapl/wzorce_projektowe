<?php

abstract class Pojazd
{

    protected $nazwa;

    public function getName()
    {
        return $this->name;
    }
}

class Auto extends Pojazd
{
    function __construct($name)
    {
        $this->name = $name;
    }
}

class AutoFabryka extends Pojazd
{

    public static function createCar($name)
    {
        return new Auto($name);
    }
}

// wzorzec prosta fabryka polega na utworzeniu klasy pośredniczącej między 
// klasami implementującymi a klasą klienta. Klient musi znać jedynie nazwę klasy 
// będącą fabryką oraz metodę wytwórczą

$fiat = new Auto('Fiat'); // normalne odwołania;
$fiat = AutoFabryka::createCar('Skoda'); // odwołanie poprzez fabrykę
echo $fiat->getName();