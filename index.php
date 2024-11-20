<?php

// require "src/Derived.php";

class Main
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public static function getInstance()
    {
        return new static("afaq");
    }
    public function display()
    {
        echo $this->name;
    }

}



// $main = new Main;
$main = Main::getInstance();
echo $main->display();