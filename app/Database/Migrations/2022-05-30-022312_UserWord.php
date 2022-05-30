<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserWord extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'word'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('user_words');
    }

    public function down()
    {
        $this->forge->dropTable('user_words');
    }
}
