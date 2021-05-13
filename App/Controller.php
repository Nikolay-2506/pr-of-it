<?php

namespace App;

use Throwable;

abstract class Controller extends ControllerAction
{
    protected View $view;

    public function __construct(Throwable $exception = null)
    {
        $this->view = new View;

        if (!is_null($exception)) {
            $this->view->exception = $exception;
        }
    }
}