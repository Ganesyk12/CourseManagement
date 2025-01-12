<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_User extends CI_Migration
{
    protected $tableName = 'User';

    public function up()
    {
        $this->dbforge->add_field([
            'IdUser' => [
                'type' => 'VARCHAR',
                'constraint' => '30',
            ],
            'Username' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'Password' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'Role' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
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
        $this->dbforge->add_key('IdUser', TRUE);
        $this->dbforge->add_field("UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP");
        $this->dbforge->add_field("CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP");

        // If you want to add a foriegn key.
        // role_id must be a column of this table, please add it above in the table. And make sure admin_roles table is added before this table. 
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (role_id) REFERENCES admin_roles(id) ON DELETE RESTRICT ON UPDATE CASCADE');

        $this->dbforge->create_table('User');

        //Inserting first row
        $this->db->insert($this->tableName, [
            'IdUser' => 'USR2205001',
            'Username' => 'Admin',
            'Password' => password_hash('123456', PASSWORD_DEFAULT),
            'Role' => 'Admin',
            'Status' => 'A',
            'UserCreated' => 'System',
            'UserModified' => 'System',
        ]);

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


/* End of file 20250112141842_User.php and path \application\migrations\20250112141842_User.php */
