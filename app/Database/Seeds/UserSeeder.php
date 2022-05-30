<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed user table in database.
     *
     * @return void
     */
    public function run()
    {
        $this->db->table('users')->insert([
            'firstname' => 'John',
            'lastname' => 'Doe',
        ]);
    }
}
