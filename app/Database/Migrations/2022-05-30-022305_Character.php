<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Character extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'       => [
                'type'       => 'INT',
                'constraint' => '61',
            ],
            'symbol'       => [
                'type'       => 'VARCHAR',
                'constraint' => '2',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('characters');
    }

    public function down()
    {
        $this->forge->dropTable('characters');
    }
}
