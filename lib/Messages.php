<?php
class Messages 
{
     static public function setMessage($typeOfMessage,$message)
    {
        $session = Session::getInstance();
        $messages = $session->get('messages', 'Messages',[]);
        $messages[$typeOfMessage][] = $message;
        $session->set('messages', $messages, 'Messages');
    }

    static public function showMessage()
    {
        $session = Session::getInstance();
        $messages = $session->get('messages','Messages' ,[]);

        foreach ($messages as $type => $lines) {
            foreach ($lines as $key => $value) {
                echo $value;
                unset ($messages[$type][$key]);
            }
            unset($messages[$type]);
        }

        $session->set('messages', $messages, 'Messages');             
    }
}
