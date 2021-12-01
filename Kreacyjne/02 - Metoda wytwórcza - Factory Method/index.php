<?php

declare(strict_types=1);

interface Pojazd
{
    public function getName(): string;
}

class Auto implements Pojazd
{
    function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Rower implements Pojazd
{
    function __construct($name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

interface FabrykaPojazdow
{
    public function create(string $name): Object;
}

class FabrykaAut implements FabrykaPojazdow
{

    public function create($name): Auto
    {
        return new Auto($name);
    }
}

class FabrykaRowerow implements FabrykaPojazdow
{

    public function create($name): Rower
    {
        return new Rower($name);
    }
}

// wzorzec metoda wytwórcza polega na utworzeniu interfejsu z metodą wytwórczą następnie implementuje sie klasy 
// fabryki które tworzą dane obiekty.
// obiekty tworzy sie poprzez poszczególne fabryki

$fabrykaAut = new FabrykaAut();
$auto = $fabrykaAut->create('Skoda');

echo $auto->getName();