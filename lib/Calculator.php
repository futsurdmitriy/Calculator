<?php
class Calculator
{
    public $result;
    public function calculate ($dataToCalculate)
    {
        $session = Session::getInstance();
        $message = new Messages();

        $data    = $dataToCalculate;

        if (false !== $data ) {
            $num1 = $data['number1'];
            $num2 = $data['number2'];

            //if(true == $session->get('userLogged')) {
                if (isset($data['Add'])) {
                    $this->result = $num1 + $num2;

                    return $this->result;
                } elseif (isset($data['Subtract'])) {
                    $this->result = $num1 - $num2;

                    return $this->result;
                } elseif (isset($data['Multiply'])) {
                    $this->result = $num1 * $num2;

                    return $this->result;
                } elseif (isset($data['Divide'])) {
                        if ($num2 == 0) {
                            $this->result = $message->setMessage('Error','Divide by zero');

                            return $this->result;
                        } else {
                            $this->result = $num1 / $num2;

                            return $this->result;
                        }
                    }
               // } else {
                  //  $message->setMessage('Error','Please relogin to continue');
                   // header('Location: http://calc.com');
                //}
        }
    }
}