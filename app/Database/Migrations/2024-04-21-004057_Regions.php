<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Regions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'country_id' => [
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

        $this->forge->createTable('regions');
    }

    public function down()
    {
        $this->forge->dropTable('regions');
    }
}
