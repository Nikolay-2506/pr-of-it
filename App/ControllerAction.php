<?php

namespace App;

abstract class ControllerAction
{
    protected bool $access = true;

    protected function access()
    {
        return $this->access;
    }

    public function action()
    {
        if ($this->access()) {
            return $this->handle();
        }
        die('Нет доступа');
    }

    abstract protected function handle();
}