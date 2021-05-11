<?php


namespace App;

use App\Models\Article;
use App\Models\Author;

/**
 * Class View
 * @package App
 *
 * @property Article[] $news
 * @property Article $article
 * @property Author[] $authors
 */
class View
{
    use ViewTrait;

    /**
     * @param string $template
     * @return false|string
     */
    public function render($template)
    {
        ob_start();
        include $template;

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}