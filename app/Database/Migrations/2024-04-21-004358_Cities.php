<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cities extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'region_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
        ]);

        $this->forge->createTable('cities');
    }

    public function down()
    {
        $this->forge->dropTable('cities');
    }
}
