<?php

// 04 - Builder - Budowniczy

declare(strict_types=1);

class Pizza
{

    protected $rozmiar;
    protected $ekstraSer = false;
    protected $ciasto = false;
    protected $sos = false;

    public function __construct($budowniczyPizzy)
    {
        $this->rozmiar = $budowniczyPizzy->rozmiar;
        $this->ekstraSer = $budowniczyPizzy->ekstraSer;
        $this->ciasto = $budowniczyPizzy->ciasto;
        $this->sos = $budowniczyPizzy->sos;
    }

    public function getName()
    {
        return 'Pizza';
    }
}


class BudowniczyPizzy
{

    public $rozmiar;
    public $ekstraSer = false;
    public $ciasto = false;
    public $sos = false;

    public function __construct($rozmiar)
    {
        $this->rozmiar = $rozmiar;
    }

    public function dodajSer()
    {
        $this->ekstraSer = true;
        return $this;
    }

    public function cienkieCiasto()
    {
        $this->ciasto = true;
        return $this;
    }

    public function dodajSos()
    {
        $this->sos = true;
        return $this;
    }

    public function doPiekatnika()
    {
        return new Pizza($this);
    }
}

// wzorzec rozwiązuje problem przekazywania wielu parametrów do budowy obiektu, 
// jednocześnie tworzy metodę która obiekt buduje


$pizza = new BudowniczyPizzy('Mała');

$pizza->cienkieCiasto()->dodajSer()->doPiekatnika();

print_r($pizza);