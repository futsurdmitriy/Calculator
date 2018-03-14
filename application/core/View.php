<?php
class View
{
    function generate($content_view, $template_view, $data = '')
    {
        ( $data ) ? extract( $data ) : '';		
        include 'application/views/'.$template_view;
    }
}
    