<?php
class ControllerLogin extends Controller
{
    function __construct()
    {
        $this->view = new View();
    }
    
    function actionIndex()
    {   
        $this->view->generate('login_view.php', 'template_view.php');	
    }
}
