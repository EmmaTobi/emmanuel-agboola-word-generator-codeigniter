<?php

namespace App\Models;

use CodeIgniter\Model;

class UserWord extends Model
{
    protected $table = 'user_words';

    protected $allowedFields = [
        'user_id',
        'word',
    ];

    public $timestamps = false;
}
