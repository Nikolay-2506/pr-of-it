<?php

namespace App;

use Throwable;
use Twig\Environment;

abstract class Controller extends ControllerAction
{
    protected ViewTwig $view;
    protected Environment $environment;

    public function __construct(Throwable $exception = null)
    {
        $this->view = new ViewTwig;

        if (!is_null($exception)) {
            $this->view->exception = $exception;
        }
    }
}