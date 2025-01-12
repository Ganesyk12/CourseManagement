<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = "Home Pages";
        $this->render('Home/Index', $data);
    }
}

/* End of file Home.php and path \application\controllers\Home.php */
