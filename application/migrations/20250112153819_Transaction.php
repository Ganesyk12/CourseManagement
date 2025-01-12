<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Transaction extends CI_Migration
{
    protected $tableName  = 'Transaction';

    public function up()
    {
        $this->dbforge->add_field([
            'IdTransaction' => [
                'type'              => 'VARCHAR',
                'constraint'        => '30',
            ],
            'IdUser' => [
                'type'              => 'VARCHAR',
                'constraint'        => '30'
            ],
            'IdCourse' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100'
            ],
            'Status' => [
                'type' => 'VARCHAR',
                'constraint' => '2',
                'default' => 'A'
            ],
            'UserCreated' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ],
            'UserModified' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ]
        ]);
        $this->dbforge->add_key('IdTransaction', TRUE);
        $this->dbforge->add_field("UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP");
        $this->dbforge->add_field("CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP");

        // If you want to add a foriegn key.
        // role_id must be a column of this table, please add it above in the table. And make sure admin_roles table is added before this table. 
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (role_id) REFERENCES admin_roles(id) ON DELETE RESTRICT ON UPDATE CASCADE');

        $this->dbforge->create_table($this->tableName);

        //Inserting first row
        // $this->db->insert($this->tableName, [
        //     'username'   => 'murad_ali',
        //     'phone'      => '123-123-7834',
        //     'password'   => password_hash('123456', PASSWORD_BCRYPT),
        // ]);
        
        //Inserting two rows
        // $data = [
        //      [
        //          'username'   => 'murad_ali',
        //          'phone'      => '123-123-7834',
        //          'password'   => password_hash('123456', PASSWORD_BCRYPT),
        //      ],
        //      [
        //          'username'   => 'murad_ali',
        //          'phone'      => '123-123-7834',
        //          'password'   => password_hash('123456', PASSWORD_BCRYPT),
        //      ]
        // ];

        // $this->db->insert_batch($this->tableName, $data);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->tableName);
    }
}


/* End of file 20250112153819_Transaction.php and path \application\migrations\20250112153819_Transaction.php */
