<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class User_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_users($limit, $start, $search, $order_col, $order_dir)
    {
        $this->db->select('IdUser, Username, Role, UserCreated, CreatedAt');
        $this->db->where('Status', 'A');
        $this->db->from('user');
        if($search) {
            $this->db->like('IdUser', $search);
            $this->db->or_like('Username', $search);
            $this->db->or_like('Role', $search);
            $this->db->or_like('UserCreated', $search);
        }

        if(!empty($order_col) && !empty($order_dir)) {
            $this->db->order_by($order_col, $order_dir);
        }

        $this->db->limit($limit, $start);

        $query = $this->db->get();
        return $query->result();
    }

    public function count_all()
    {
        $this->db->from('user');
        $this->db->where('Status', 'A');
        return $this->db->count_all_results();
    }

    public function count_filtered($search)
    {
        $this->db->select('IdUser');
        $this->db->from('user');
        $this->db->where('Status', 'A');
        if ($search) {
            $this->db->like('Username', $search);
            $this->db->or_like('IdUser', $search);
            $this->db->or_like('Role ', $search);
            $this->db->or_like('UserCreated ', $search);
        }
        return $this->db->count_all_results();
    }
}


/* End of file User_model.php and path \application\models\User_model.php */
