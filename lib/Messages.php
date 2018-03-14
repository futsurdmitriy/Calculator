<?php
class Messages 
{
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
                unset ($messages[$type][$key]);
            }
            unset($messages[$type]);
        }

        $session->set('messages', $messages);             
    }
}
