<?php

interface SystemPlikow
{
    public function getContent();
}

class Katalog implements SystemPlikow
{

    protected $files = [];

    public function addPlik($plik)
    {
        $this->files[] = $plik;
    }

    public function getContent()
    {
        $content = [];

        foreach ($this->files as $file) {

            $content[] = $file->getContent();
        }

        return $content;
    }
}

class Plik implements SystemPlikow
{
    public function getContent()
    {
        return 'Zawartość pliku';
    }
}


// wzorzec służy do budowania struktur drzewiastych
// za jego pomocom można budować struktury z dużą ilością zagnieżdżeń

$plik1 = new Plik();
$plik2 = new Plik();

$katalog1 = new Katalog();
$katalog2 = new Katalog();

$katalog2->addPlik($plik1);
$katalog2->addPlik($plik2);


$katalog1->addPlik($plik1);
$katalog1->addPlik($plik2);
$katalog1->addPlik($katalog2);


echo '<pre>';
print_r($katalog1->getContent());
echo '</pre>';