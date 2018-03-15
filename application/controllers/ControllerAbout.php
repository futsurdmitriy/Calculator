<?php
class ControllerAbout extends Controller
{
    function __construct()
    {
        $this->view = new View();
    }
    
    function actionIndex()
    {           
        $this->view->generate('about_view.php', 'template_view.php');	
    }
}