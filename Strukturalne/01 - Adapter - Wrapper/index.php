<?php

class Produkt
{
    protected $sku;
    protected $cena;

    public function __construct($sku, $cena)
    {
        $this->sku = $sku;
        $this->cena = $cena;
    }

    public function pobierzSka()
    {
        return $this->sku;
    }


    public function pobierzCene()
    {
        return $this->cena;
    }
}

//adapter

class AdapterProduktu
{
    public function __construct(Produkt $produkt)
    {
        $this->produkt = $produkt;
    }

    public function wyswietlSku()
    {
        return $this->produkt->pobierzSka();
    }

    public function wyswietlCene()
    {
        return $this->produkt->pobierzCene();
    }
}

// Wzorzec używa sie kiedy aplikacje klienckie wymagają użycia funkcji niekompatybilnych w klasami bazowymi
// Tworzy sie wtedy klasę adaptera który przepisuje stare metody 
// na jej nowe wymagane przez klienta odpowiedniki 


//klient

$produkt = new Produkt('7757656712', 2500.99);

$adapterProduktu = new AdapterProduktu($produkt);

echo $adapterProduktu->wyswietlSku();
echo '<br><br>';
echo $adapterProduktu->wyswietlCene();