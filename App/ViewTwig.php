<?php

namespace App;

use App\Models\Article;
use App\Models\Author;
use Throwable;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * Class ViewTwig
 * @package App
 *
 * @property string     $title
 * @property Article[]  $news
 * @property Article    $article
 * @property Author[]   $authors
 * @property Throwable  $exception
 */
class ViewTwig
{
    public const NEWS_TEMPLATE = 0;
    public const ARTICLE_TEMPLATE = 1;
    public const EXCEPTION_TEMPLATE = 2;

    use ViewTrait;

    protected Environment $environment;
    protected string      $template;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/Template/twig');
        $this->environment = new Environment($loader,
            ['cache' => __DIR__ . '/../var/cache/twig',
             'auto_reload' => true,
             'debug' => true ]);
    }

    public function setTemplate(int $template = ViewTwig::NEWS_TEMPLATE)
    {
        switch ($template)
        {
            case 0:
            default:
                $this->template = 'newsTemplate.twig';
                break;
            case 1:
                $this->template = 'articleTemplate.twig';
                break;
            case 2:
                $this->template = 'exceptionTemplate.twig';
                break;
        }
    }

    public function render()
    {
        return $this->environment->render($this->template, $this->data);
    }
}