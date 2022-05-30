<?php

namespace App\Controllers;

use App\Services\UserWordService;
use App\Services\RandomWordService;
use Illuminate\Http\Request;

class RandomWord extends BaseController
{
    private UserWordService $userWordService;
    private RandomWordService $randomWordService;

    public function __construct()
    {
        $this->userWordService = new UserWordService();
        $this->randomWordService = new RandomWordService();
    }

    /**
     * Handle User Create Random Words Request
     * @param Request $request
     */
    public function generateFreshWords(): void
    {
        $rules = [
            'type' => 'required',
            'length' => 'required|integer',
            'quantity' => 'required|integer',
        ];

        $results = [];

        echo view('/templates/header');
        if($this->validate($rules)){

            $results = $this->randomWordService->getRandomCharactersByType(
                $this->request->getVar('type'),
                $this->request->getVar('length'),
                $this->request->getVar('quantity'),
            );
    
            $userId = session()->get('userId');
    
            $results = array_map(function($word) use ($userId) {
                return [
                    'user_id' => $userId,
                    'word' => $word,
                ];
            }, $results);
    
            $this->userWordService->deleteManyByUserId($userId);
    
            $this->userWordService->createMany($results);
            
            echo view('words', compact('results'));
        } else {
            $validation = $this->validator;
            echo view('words', compact('validation'));
        }
        echo view('/templates/footer');
    }

    /**
     * Display Create Random Words Request Form
     * @param Request $request
     */
    public function edit(): void
    {
        $session = session();
        $userId = $session->get('userId');
        $results = $this->userWordService->getManyByUserId($userId);

        echo view('/templates/header');
        echo view('words', compact('results'));
        echo view('/templates/footer');
    }
}
