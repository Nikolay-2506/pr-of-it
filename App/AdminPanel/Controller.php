<?php

namespace App\AdminPanel;

use App\ControllerAction;

abstract class Controller extends ControllerAction
{
    protected string $location;
    protected View $view;

    public function __construct()
    {
        $this->view = new View;
        $this->location = 'http://profit.local/App/AdminPanel/index.php';
    }
}