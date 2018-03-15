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
        
        $dataToCalculate = $dataEntry->CorrectDataCheck($_POST);
        $data['result'] = $calculator->calculate($dataToCalculate);
        
        $this->view->generate('calculator_view.php', 'template_view.php', $data);                   
    }
}
