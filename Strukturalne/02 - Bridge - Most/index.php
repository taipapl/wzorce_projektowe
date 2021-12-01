<?php

interface Komponet
{
    function __construct(Platforma $platforma);
    function getNazwa();
}

class Galeria implements Komponet
{

    protected $platforma;

    function __construct(Platforma $platforma)
    {
        $this->platforma = $platforma;
    }

    function getNazwa()
    {
        return 'Komponent Galeria' . '-' . $this->platforma->getPlatforma();
    }
}

class Obrazek implements Komponet
{

    protected $platforma;

    function __construct(Platforma $platforma)
    {
        $this->platforma = $platforma;
    }

    function getNazwa()
    {
        return 'Komponent Obrazka' . '-' . $this->platforma->getPlatforma();
    }
}

interface Platforma
{
    public function getPlatforma();
}

class UiKit implements Platforma
{
    public function getPlatforma()
    {
        return 'UiKit';
    }
}

class Bootstrap implements Platforma
{
    public function getPlatforma()
    {
        return 'Bootstrap';
    }
}

// wzorzec most buduje połączenie pomiędzy
// dwoma kolumnami połączonych zależnościami obiektów tworząc swoisty most

$UiKit = new UiKit();
$galeria = new Galeria($UiKit);
echo $galeria->getNazwa();

echo '<br><br>';

$Bootstrap = new Bootstrap();
$galeria = new Obrazek($Bootstrap);
echo $galeria->getNazwa();