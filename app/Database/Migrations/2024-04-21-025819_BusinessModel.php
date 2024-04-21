<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BusinessModel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
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

        $this->forge->createTable('business_model');
    }

    public function down()
    {
        $this->forge->dropTable('business_model');
    }
}
