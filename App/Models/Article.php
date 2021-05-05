<?php

namespace App\Models;


use App\Db;
use App\Model;
use App\ViewTrait;
use Countable;

/**
 * Class Article
 * @package App\Models
 *
 * @property Author $author
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

    public function __get($name)
    {
        if ($name == 'author') {
            if (!is_null($this->author_id)) {
                if (!isset($this->author)){
                    $this->author = Author::findById($this->author_id);
                }
            }
        }

        return $this->data[$name] ?? null;
    }
}
