<?php

namespace App\Models;


use App\Db;
use App\Model;

class Article extends Model
{

    protected static $table = 'news';

    public $title;
    public $content;

}
