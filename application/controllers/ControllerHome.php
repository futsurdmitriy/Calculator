<?php
class ControllerHome extends Controller
{
    function __construct()
    {
        $this->view = new View();
    }
    
    function actionIndex()
    {   
        $this->view->generate('home_view.php', 'template_view.php');	
    }
}