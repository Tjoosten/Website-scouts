<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_drive extends CI_Migration
{
    /**
     * Run the migration.
     */
    public function up()
    {
        $this->dbforge->add_field([
            'ID' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'Naam' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'file_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'file_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'file_extension' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'file_size' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
    }

    /**
     * Revert the migration.
     */
    public function down()
    {
        $this->dbforge->drop_table('Drive');
    }
}
