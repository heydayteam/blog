<?php
/**
 * User: Nova
 * Date: 28.01.2015
 */
class MainController extends Controller
{
    public $main_model;

    function __construct()
    {
        $this->init_models();
        $this->view = new View();
    }

    function show()
    {
        $data = $this->main_model->get_data();
        $this->view->generate('MainView.php', 'template.php', $data);
    }

    private function init_models()
    {
        include 'application/models/MainModel.php';
        $this->main_model = new MainModel();
    }
}