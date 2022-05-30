<?php

namespace App\Services;

use App\Models\UserWord;
use Illuminate\Support\Collection;

class UserWordService
{
    private UserWord $model;

    function __construct()
    {
        $this->model = model(UserWord::class);
    }

    /**
     * Create Many User Words
     * @param array $data 
     * @return bool
     */
    public function createMany(array $data): bool
    {
        return  $this->model->insertBatch($data);
    }

    /**
     * Delete Many User Words
     * @param array $userId
     * @return bool
     */
    public function deleteManyByUserId(int $userId): bool
    {
        return  $this->model->where(['user_id' => $userId])->delete();
    }

    /**
     * Get Many User Words
     * @param array $userId
     * @return bool
     */
    public function getManyByUserId(int $userId): array
    {
        return  $this->model->where(['user_id' => $userId])->get()->getResultArray();
    }
    
}
