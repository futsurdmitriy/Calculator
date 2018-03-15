<?php
class View
{
    function generate($content_view, $template_view, $data = '')
    {
        $session = Session::getInstance();
        $message = new Messages;
        ( $data ) ? extract( $data ) : '';
        
        if ($session->get('userLogged')) {
            $template_view = 'logged_in_template_view.php';            
        } else {
            $template_view = 'logged_out_template_view.php';
        }       		

        include 'application/views/'.$template_view;
    }
}
    