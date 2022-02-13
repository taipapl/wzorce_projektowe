<?php

// 06 - Singleton

final class DbCon
{

    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone()
    {
    }
}

// Singleton polega na możliwości utworzenie tylko jednej instancji klasy;
// ważne jest aby zablokować __construct i __clone, ustawiając obie metody magiczne na private 


$bg = DbCon::getInstance();
$bg1 = DbCon::getInstance();

print_r($bg === $db1);