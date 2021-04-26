<?php

namespace App\Models;


use App\Db;
use App\Model;
use App\ViewTrait;

/**
 * Class Article
 * @package App\Models
 *
 * @property $author
 */
class Article extends Model
{
    use ViewTrait;
    /* Нужно будет через магические методы реализовать получение автора по author_id */
    /* Вопрос стоит в том, нужно ли переопределять trait или писать в этом же файле */

    protected static $table = 'news';

    public $title;
    public $content;
    public $author_id;
}
