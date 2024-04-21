<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Countries extends Migration
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

        $this->forge->createTable('countries');
    }

    public function down()
    {
        $this->forge->dropTable('countries');
    }
}
