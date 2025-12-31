<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWeatherLocationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'city_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'latitude' => [
                'type' => 'DECIMAL',
                'constraint' => '10,7',
            ],
            'longitude' => [
                'type' => 'DECIMAL',
                'constraint' => '10,7',
            ],
            'temperature' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => true,
            ],
            'humidity' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true,
            ],
            'condition' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'wind_speed' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => true,
            ],
            'pressure' => [
                'type' => 'INT',
                'constraint' => 4,
                'null' => true,
            ],
            'last_updated' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey(['latitude', 'longitude']);
        $this->forge->createTable('weather_locations');
    }

    public function down()
    {
        $this->forge->dropTable('weather_locations');
    }
}
