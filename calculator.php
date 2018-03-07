<?php
include 'messages.php';

class Calculator
{
    public $result;

    public function writeToLogFile ($whatDataWasUsed) 
    {
        if (!empty($_SERVER['REMOTE_ADDR']))
        {
            $ip = $_SERVER['REMOTE_ADDR'];                      
        }
        else 
        {
            $ip = "???.???.???.???";
        }
            
        $data = $whatDataWasUsed;
        $log  = "User: ".$ip.PHP_EOL.
                "Date: ".date("F j, Y, g:i a").PHP_EOL.
                "Data: ".json_encode($data).PHP_EOL.
                "Result of Action: ".json_encode($this->result).PHP_EOL.
                "-------------------------".PHP_EOL;                        
        file_put_contents("/var/www/html/errors.log", $log, FILE_APPEND);        
    }

    public function formValueSet($data,$txtNumber)
    {   
       return (isset($data[$txtNumber])) ? $data[$txtNumber] : '';
    }
   
    public function formPacking ($data,$txtMethod)
    {
        $message = new Messages();
        $message->showMessage();
        echo'<form action="' . $_SERVER['PHP_SELF'] .'" method="' . $txtMethod . '">' .
            '<input type="text" name = "number1" value = "' . $this->formValueSet($data,'number1') . '" />' .
            '<br/>' .
            '<button name="Add">+</button>'.
            '<button name="Subtract">-</button>' .
            '<button name="Multiply">*</button>' .
            '<button name="Divide">/</button>' .
            '<br/>' .
            '<input type="text" name ="number2" value = "' . $this->formValueSet($data,'number2') . '" />' .
            '<input type="hidden" name="form" value="1" />' .
            '</form>';        
    }  
   
    public function output_message ($txt)
    {
        $this->result=$txt;
        echo "<span style=\"background:red\">" . $txt . "</span>";
    }   

   public function CorrectDataCheck($dataToCheck)
   {
    if(false !== $_SESSION['isLoginned']){
       if(empty($dataToCheck)&&(!isset($dataToCheck['number1']) || !isset($dataToCheck['number2'])))
       {
           return false;
       }
       else if (!empty($dataToCheck) && ((isset($dataToCheck['number1']) || isset($dataToCheck['number2']))&&($dataToCheck['number1']==NULL)||($dataToCheck['number2']==NULL)) )
       {
        $this->output_message ('Please Enter The Numbers to Calculate');
           return false;   
       }
   
       $dataToCheck = str_replace(",", ".", $dataToCheck);
   
       if (!is_numeric($dataToCheck['number1']) || !is_numeric($dataToCheck['number2']))
       {
           $this->output_message ('Please Enter The Correct Data to Calculate');
           return false;
       }
       return $dataToCheck;
    }
   else 
        {
            header('Location: http://127.0.0.1/info.php'); 
        }

   }
   
   public function calculate ($data) 
   {
        $message = new Messages();
       $data = $this->CorrectDataCheck($data);
       if(false !== $data )
       {    
           $num1 = $data['number1'];
           $num2 = $data['number2'];
           if(false !== $_SESSION['isLoginned'])
            {
                if(isset($data['Add']))
                {
                    $this->result = $num1 + $num2;           
                        return $this->result;
                    
                }
                else if(isset($data['Subtract']))
                {
                        $this->result = $num1 - $num2;           
                        return $this->result;
                }
                else if(isset($data['Multiply']))
                {
                        $this->result = $num1 * $num2;           
                        return $this->result;
                }
                else if(isset($data['Divide']))
                {
                    if ($num2 == 0)
                    {
                            $this->result = $this->output_message ('Error: Divide by zero');           
                            $message->setMessage('Error','Divide by zero');
                            return $this->result;                    
                    }
                    else
                    {
                            $this->result = $num1 / $num2;           
                            return $this->result;
                    }
                }
            }
            else 
            {
                $message->setMessage('Error','Please relogin to continue');
                header('Location: http://127.0.0.1/info.php'); 
            }
        }
    }
}

 
