<?php

use App\Controller;
use App\Controllers\Exception as ExceptionController;
use App\Exceptions\DBException;
use App\Exceptions\Errors;
use App\Exceptions\NotFoundException;

/** @var Controller $ctrl */

require __DIR__ . '/autoload.php';

$ctrlName = isset($_GET['ctrl']) ? ucfirst($_GET['ctrl']) : 'Index';
$ctrlClass = '\App\Controllers\\' . $ctrlName;

$ctrl = new $ctrlClass;
try {
    $ctrl->action();
} catch (DBException $DBException) {
    $ctrl = new ExceptionController($DBException);
    $ctrl->action();
} catch (NotFoundException $notFoundException) {
    include __DIR__ . '/App/Template/404.html';
} catch (Errors $errors) {
    // логирование ошибок при заполнение структуры
    $ctrl = new ExceptionController(new Exception('Не предвиденная ошибка'));
}