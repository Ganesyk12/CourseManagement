<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('test');
    }
}

/* End of file Test.php and path \application\controllers\Test.php */
