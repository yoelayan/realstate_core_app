<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RealState extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true
            ],
            'code_property' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'country_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'region_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'city_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'currency_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'kind_property_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'kind_market_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'kind_unit_area_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'property_conditions_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'business_model_id' => [
                'type' => 'INT',
                'null' => false,
            ],
            'sale_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'rental_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'location_coordinates' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'meters_characteristics' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'general_characteristics' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);

        $this->forge->createTable('real_state');
    }

    public function down()
    {
        $this->forge->dropTable('real_state');
    }
}
