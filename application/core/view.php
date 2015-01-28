<?php
/**
 * User: Nova
 * Date: 28.01.2015
 */
class View
{
    function generate($content_view, $template_view, $data = null)
    {
        include 'application/views/'.$template_view;
    }
}