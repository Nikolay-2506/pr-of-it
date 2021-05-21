<?php

namespace App\Controllers;

use App\Controller;
use App\ViewTwig;

class Exception extends Controller
{
    protected function handle()
    {
        $this->view->setTemplate(ViewTwig::EXCEPTION_TEMPLATE);
        echo $this->view->render();
    }
}