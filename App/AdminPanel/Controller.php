<?php


namespace App\AdminPanel;


use App\ControllerAction;

abstract class Controller extends ControllerAction
{
    protected string $location;

    public function __construct()
    {
        $this->location = 'http://profit.local/App/AdminPanel/index.php';
    }
}