<?php
/**
 * User: Nova
 * Date: 28.01.2015
 */
class Controller
{
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function show()
    {
    }

    private function init_models()
    {
    }
}