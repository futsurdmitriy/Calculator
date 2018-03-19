<?php
class Calculator
{
    public $result;
    public function calculate ($dataToCalculate)
    {
        $session = Session::getInstance();
        $message = new Messages();
        $SQLQuery = new SQLQueries;

        $data    = $dataToCalculate;

        if (false !== $data ) {
            $num1 = $data['number1'];
            $num2 = $data['number2'];

            //if(true == $session->get('userLogged')) {
                if (isset($data['Add'])) {
                    $res = $num1+$num2;
                    $this->result = "$num1 + $num2 = ". $res;

                } elseif (isset($data['Subtract'])) {                    
                    $res = $num1-$num2;
                    $this->result = "$num1 - $num2 = ". $res;

                } elseif (isset($data['Multiply'])) {
                    $res = $num1*$num2;
                    $this->result = "$num1 * $num2 = ". $res;

                } elseif (isset($data['Divide'])) {

                    if ($num2 == 0) {
                        $this->result = $message->setMessage('Error','Divide by zero');

                    } else {
                        $res = $num1/$num2;
                        $this->result = "$num1 / $num2 = ". $res;
                    }
                }
                
                    $sql = $SQLQuery->InsertInto('history ', 'Datetime, Expression, UserId', "'".date("Y-m-d H:i:s")."', "."'".$this->result."', "."'".$session->get('Id','Users')."'");
                    return $this->result;
               // } else {
                  //  $message->setMessage('Error','Please relogin to continue');
                   // header('Location: http://calc.com');
                //}
        }
    }
}