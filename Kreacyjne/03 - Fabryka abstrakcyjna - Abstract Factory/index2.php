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

class FormFabryka extends AbstakcyjnaFabryka
{

    protected $framework;

    function __construct(string $framework)
    {
        $this->framework = $framework;
    }

    function createButton()
    {
        switch ($this->framework) {
            case 'UiKit':
                return new UiKitButton();
                break;
            case 'Bootstrap':
            default:
                return new BootstapButton();
                break;
        }
    }

    function createMenu()
    {

        switch ($this->framework) {
            case 'UiKit':
                return new UiKitMenu();
                break;
            case 'Bootstrap':
            default:
                return new BootstapMenu();
                break;
        }
    }
}


// wzorzec fabryka abstrakcyjna polega na stworzeniu klasy fabryki przysłaniają klasy z implementacją. 
// Wynikiem fabryki jest obiekt z wieloma metodami
// Ta wersja usunęła jedną fabrykę która została zastąpiona konstruktorem

$form = new FormFabryka("UiKit");

$button = $form->createButton();
echo $button->getName() . '<br><br>';

$menu = $form->createMenu();
echo $menu->getName();