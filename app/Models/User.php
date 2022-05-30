<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $allowedFields = [
        'firstname',
        'lastname'
    ];

    public function words()
    {
        return $this->hasMany(UserWord::class);
    }
}
