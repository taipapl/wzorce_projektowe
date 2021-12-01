<?php

interface Ksztalt
{
    public function __construct($nazwa, $color);
}

// pyłek


class PodstawowyKsztalt implements Ksztalt
{
    private $name;
    private $color;

    public function __construct($nazwa, $color)
    {
        $this->name = $nazwa;
        $this->color = $color;
    }
}

//fabryka pyłku

class FabrykaPodstawowychKsztaltow
{
    private $instance = [];

    public function getPodstawowyKsztalt($nazwa, $color)
    {
        if (!isset($this->instance[$nazwa])) {
            $this->instance[$nazwa] = new PodstawowyKsztalt($nazwa, $color);
        }
        return $this->instance[$nazwa];
    }

    public function zliczInstancje()
    {
        return count($this->instance);
    }
}

$fabryka = new FabrykaPodstawowychKsztaltow();

for ($i = 0; $i < 300000; $i++) {
    $fabryka->getPodstawowyKsztalt('Kwadrat' . $i, "Zielony" . $i);
}


// we wzorcu pyłek tworzy sie jeden obiekt poprzez fabrykę.
// Jeden obiekt zawiera wiele właściwości imitujących obiekt

echo $fabryka->zliczInstancje();

echo '<br><br>';

print_r($fabryka->getPodstawowyKsztalt('Kwadrat777', "Zielony777"));