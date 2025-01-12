<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

    protected function render($view, $data = [])
    {
        $this->load->view('base/header', $data);
        $this->load->view('base/sidebar', $data);
        $this->load->view($view, $data);
        $this->load->view('base/footer', $data);
    }
}