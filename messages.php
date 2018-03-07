<?php
include "session.php";
$messages = new Messages();

echo '<pre> Line: ' . __LINE__ . ' | ' . __FILE__ . PHP_EOL;
print_r($_SESSION);
echo PHP_EOL . '</pre>' . PHP_EOL;


class Messages {
    public function setMessage($typeOfMessage,$message)
    {
        $session = Session::getInstance();
        $messages = $session->get('messages', []);

        $messages[$typeOfMessage][] = $message;

        $session->set('messages', $messages);             
    }

    public function showMessage()
    {
        $session = Session::getInstance();
        $messages = $session->get('messages', []);

        foreach ($messages as $type => $lines) {
            foreach ($lines as $key => $value) {
                echo $value;
                unset ( $messages[$type][$key] );
            }
            unset($messages[$type]);
        }

        /*foreach($_SESSION as $key => $value)
        {
            if($value)
            {
                foreach($value as $key2 => $value2)
                {
                    echo "[$key2]:[$value2]";
                }
            }
        }   */
        $session->set('messages', $messages);             
    }
   
}

