<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration extends CI_Controller {

    private $userClass = 'Migration_User';
    private $userVersion = '20250112141842';

    private $courseClass = 'Migration_Course';
    private $courseVersion = '20250112151158';

    private $trxClass = 'Migration_Transaction';
    private $trxVersion = '20250112153819';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('migration');
        $this->load->helper('url');
    }

    public function migrate($version, $name)
    {
        if(!$this->migration->version($version)) {
            show_eror($this->migration->error_string());
        }
        echo "Migration {$name} version {$version} Success!.";
    }

    public function migrateUser()
    {
        $this->migrate($this->userVersion, $this->userClass);
    }

    public function migrateCourse()
    {
        $this->migrate($this->courseVersion, $this->courseClass);
    }
    public function migrateTrx()
    {
        $this->migrate($this->trxVersion, $this->trxClass);
    }
}

/* End of file Migration.php and path \application\controllers\Migration.php */
