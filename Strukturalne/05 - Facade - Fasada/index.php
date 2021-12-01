<?php



class Produkt
{
    public function getProdukt()
    {
        return 'Produkt';
    }
}

class Platnosc
{
    public function makePlatnosc()
    {
        return true;
    }
}

class Zamawiajacy
{
    public function getZamawiajacy()
    {
        return 'Dane zamawiajacego';
    }
}


class Fasada
{
    protected $produkt;
    protected $platnosc;
    protected $zamawiajacy;

    public function __construct()
    {
        $this->produkt = new Produkt();
        $this->platnosc = new Platnosc();
        $this->zamawiajacy = new Zamawiajacy();
    }

    public function Zamowienie()
    {
        $this->produkt->getProdukt();
        $this->platnosc->makePlatnosc();
        $this->zamawiajacy->getZamawiajacy();

        return 'Zamówienie';
    }
}

// Wzorzec fasady polega na przykryciu wielu obiektów jednym obiektem który wszytko wykonuje
// Jeżeli modyfikuje się klasy zazwyczaj trzeba zmodyfikować fasadę

$klient = new Fasada;
echo $klient->Zamowienie();