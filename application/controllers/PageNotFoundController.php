<?php
/**
 * User: Nova
 * Date: 28.01.2015
 */
class PageNotFoundController extends Controller
{
    function __construct()
    {
        $this->view = new View();
    }

    function show()
    {
        $this->view->generate('PageNotFoundView.php', 'template.php');
    }
}