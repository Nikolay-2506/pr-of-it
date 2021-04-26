<?php


namespace App;

/**
 * Class View
 * @package App
 *
 * @property $news
 */
class View
{
    use ViewTrait;

    protected array $data = [];

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