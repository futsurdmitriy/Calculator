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
        $session = Session::getInstance();
        $SQLQuery = new SQLQueries;


        if (true == $session->get('UserLogged','Users')) {
            
            //$data['history'] = $calculator->getHistory();
            $dataToCalculate = $dataEntry->CorrectDataCheck($_POST);
            $data['result']  = Calculator::calculate($dataToCalculate);            

            $this->view->generate('calculator_view.php', 'template_view.php', $data); 
        } else {
            Messages::setMessage('Error','You must sign in to use the calculator');
            $this->view->generate('login_view.php', 'template_view.php');
        }
    }
}
