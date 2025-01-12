<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = "User Pages";
        $this->render('User/Index', $data);
    }



    public function get_userData()
    {
        $limit = $this->input->get('length');
        $start = $this->input->get('start');
        $search = $this->input->get('search')['value'];
        $order = $this->input->get('order');
        $columns = $this->input->get('columns');

        $col_index = $order[0]['column'];
        $order_dir = $order[0]['dir'];
        $col_name = $columns[$col_index]['data'];
        $total_data = $this->User_model->count_all();
        $total_filtered = $this->User_model->count_filtered($search);

        $data = $this->User_model->get_users($limit, $start, $search, $col_name, $order_dir);
        $output = array(
            "draw" => intval($this->input->get('draw')),
            "recordsTotal" => $total_data,
            "recordsFiltered" => $total_filtered,
            "data" => $data
        );
        echo json_encode($output);
    }
}

/* End of file User.php and path \application\controllers\User.php */
