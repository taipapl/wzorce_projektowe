<?php

abstract class Button
{
    abstract function getName();
}

class UIKitButton extends Button
{
    function getName()
    {
        return '<button class="uk-button">UiKit Button</button>';
    }
}

class BootstapButton extends Button
{
    function getName()
    {
        return '<button class="btn">Bootstap Button</button>';
    }
}

abstract class Menu
{
    abstract function getName();
}

class UIKitMenu extends Menu
{
    function getName()
    {
        return '<nav class="uk-nav">UiKit Menu</nav>';
    }
}

class BootstapMenu extends Menu
{
    function getName()
    {
        return '<nav class="nav">Bootstap Menu</nav>';
    }
}


abstract class AbstakcyjnaFabryka
{
    abstract function createButton();
    abstract function createMenu();
}

class UiKitFabryka extends AbstakcyjnaFabryka
{
    function createButton()
    {
        return new UiKitButton();
    }

    function createMenu()
    {
        return new UiKitMenu();
    }
}

class BootstrapFabryka extends AbstakcyjnaFabryka
{
    function createButton()
    {
        return new BootstapButton();
    }

    function createMenu()
    {
        return new BootstapMenu();
    }
}


$framework = "UiKit";

$form = null;

if ($framework == "UiKit") {
    $form = new UiKitFabryka();
} else {
    $form = new BootstrapFabryka();
}

// wzorzec fabryka abstrakcyjna polega na stworzeniu klasy fabryki przysłaniają klasy z implementacją. 
// Wynikiem fabryki jest obiekt z wieloma metodami


$button = $form->createButton();
echo $button->getName() . '<br><br>';

$menu = $form->createMenu();
echo $menu->getName();