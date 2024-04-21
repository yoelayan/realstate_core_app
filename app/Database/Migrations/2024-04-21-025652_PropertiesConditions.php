<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PropertiesConditions extends Migration
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

        $this->forge->createTable('properties_conditions');
    }

    public function down()
    {
        $this->forge->dropTable('properties_conditions');
    }
}
