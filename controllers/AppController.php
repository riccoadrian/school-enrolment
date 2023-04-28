<?php

class AppController
{
    public $model;

    public function indexAction()
    {
        return require_once '../views/dashboard.php';
    }
}
