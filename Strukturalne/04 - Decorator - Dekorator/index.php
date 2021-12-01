<?php

declare(strict_types=1);


interface Window
{
    public function renderWindow();
}


class BasicWindow implements Window
{
    public function renderWindow()
    {
        return '<div>Okno</div>';
    }
}

interface WindowDecorator
{
    public function renderWindow();
    public function __construct($window);
}

class closeWindow implements WindowDecorator
{

    public function renderWindow()
    {
        return $this->window->renderWindow() . $this->renderClose();
    }

    public function renderClose()
    {
        return '<div>close<div>';
    }

    public function __construct($window)
    {
        $this->window = $window;
    }
}

// dekorator opakowuje(dekoruje) jeden obiekt w drugi dodając do niego nowe właściwości



$window = new BasicWindow();
$window = new closeWindow($window);
echo $window->renderWindow();