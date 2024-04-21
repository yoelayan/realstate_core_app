<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KindsProperty extends Migration
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

        $this->forge->createTable('kinds_property');
    }

    public function down()
    {
        $this->forge->dropTable('kinds_property');
    }
}
