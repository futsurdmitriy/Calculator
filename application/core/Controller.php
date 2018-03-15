<?php
class Controller
{
    public $view;

    function __construct()
    {
        $this->view = new View();
        $session = Session::getInstance();
    }

    function actionIndex()
    {

    }
}
