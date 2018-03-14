<?php
class LogFile
{
    public function writeToLogFile ($whatDataWasUsed) 
    {
        if (!empty($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];                      
        } else {
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
}
