<?php


namespace App\Models;

use App\Model;

class Author extends Model
{
    protected static $table = 'authors';

    public $email;
    public $lastName;
    public $firstName;
    public $fatherName;
}