<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Seed characters table in database.
     *
     * @return void
     */
    public function run()
    {
        $this->db->table('characters')->insertBatch(
            $this->getCharactersPayload()
        );
    }

    /**
     * Get Characters Payload
     *
     * @return array
     */
    public function getCharactersPayload(): array 
    {
       return array_merge($this->getNumbers(), $this->getAlphabets());
    }

    /**
     * Get Number Characters Payload
     *
     * @return array
     */
    public function getNumbers(): array
    {
        $result =  array_map(function(int $number){
            return [
                'id' => $number,
                'symbol' => $number,
            ];
        }, range(0, 9));

        return $result;
    }

    /**
     * Get Alphabets Characters Payload
     *
     * @return array
     */
    public function getAlphabets(): array
    {
        $counter = 9;

        $lowerCase = array_map(function(string $char) use (&$counter){
            return [
                'id' => ++$counter,
                'symbol' => $char,
            ];
        }, range('a', 'z'));

        $upperCase = array_map(function(string $char) use (&$counter){
            return [
                'id' => ++$counter,
                'symbol' => $char,
            ];
        }, range('A', 'Z'));

        $result =  array_merge($lowerCase, $upperCase);

        return $result;
    }
}
