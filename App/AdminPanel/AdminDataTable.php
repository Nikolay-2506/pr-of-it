<?php

namespace App\AdminPanel;

use App\Models\Article;
use Closure;

/**
 * Class AdminDataTable
 * @package App\AdminPanel
 */
class AdminDataTable
{
    protected View $view;
    /**
     * AdminDataTable constructor.
     * @param Article[] $rows
     * @param Closure[] $columns
     */
    public function __construct($rows, $columns)
    {
        $this->view = new View;
        $this->view->rows = $rows;
        $this->view->columns = $columns;
    }

    public function getView()
    {
        return $this->view;
    }
}