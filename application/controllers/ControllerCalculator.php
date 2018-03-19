<?php
class ControllerCalculator extends Controller
{
    function __construct()
    {
        $this->view = new View();
    }
    
    function actionIndex()
	{	    
        $dataEntry = new DataEntryCheck;
        $calculator = new Calculator;
        $session = Session::getInstance();
        $message = new Messages;

        if (true == $session->get('UserLogged','Users')) {
            $dataToCalculate = $dataEntry->CorrectDataCheck($_POST);
            $data['result'] = $calculator->calculate($dataToCalculate);            
            $this->view->generate('calculator_view.php', 'template_view.php', $data); 
        } else {
            $message->setMessage('Error','You must sign in to use the calculator');
            $this->view->generate('login_view.php', 'template_view.php');
        }
    }
}
