<?php

namespace App\Controllers;

use App\Controller;

class Exception extends Controller
{
    protected function handle()
    {
        echo $this->view->render(__DIR__ . '/../Template/exception.php');
    }
}