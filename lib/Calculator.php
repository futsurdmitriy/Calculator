<?php
class Calculator
{
    static public $result;
    static public $history;

    static public function calculate ($dataToCalculate)
    {
        $session  = Session::getInstance();
        $SQLQuery = new SQLQueries;
        

        $data     = $dataToCalculate;

        if (false !== $data ) {
            $num1 = $data['number1'];
            $num2 = $data['number2'];

            //if(true == $session->get('userLogged')) {
                if (isset($data['Add'])) {
                    $res = $num1+$num2;
                    self::$result = "$num1 + $num2 = ". $res;

                } elseif (isset($data['Subtract'])) {
                    $res = $num1-$num2;
                    self::$result = "$num1 - $num2 = ". $res;

                } elseif (isset($data['Multiply'])) {
                    $res = $num1*$num2;
                    self::$result = "$num1 * $num2 = ". $res;

                } elseif (isset($data['Divide'])) {

                    if ($num2 == 0) {
                        self::$result = Messages::setMessage('Error','Divide by zero');

                    } else {
                        $res = $num1/$num2;
                        self::$result = "$num1 / $num2 = ". $res;
                    }
                }

                    $SQLQuery->InsertInto('history ', 'Datetime, Expression, UserId', "'".date("Y-m-d H:i:s")."', "."'".self::$result."', "."'".$session->get('Id','Users')."'");

                    return self::$result;
               // } else {
                  //  $message->setMessage('Error','Please relogin to continue');
                   // header('Location: http://calc.com');
                //}
        }
    }

    static public function getHistory()
    {
        $session  = Session::getInstance();
        $SQLQuery = new SQLQueries;

        self::$history  = $SQLQuery->SelectFrom('Expression, Datetime', 'history','UserId='.$session->get('Id','Users'));        
        self::$history -> setFetchMode(PDO::FETCH_NUM);

            while ($row = self::$history->fetch()) {
                echo "<tr>";
                echo "<td>" . $row[0] . "</th>";
                echo "<td>" . $row[1] . "</th>";
                echo"</tr>";
            }
    }
}