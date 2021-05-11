<?php

namespace App;

abstract class Controller extends ControllerAction
{
    protected View $view;

    public function __construct()
    {
        $this->view = new View;
    }
}