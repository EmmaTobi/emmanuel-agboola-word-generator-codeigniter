<?php

namespace App\Controllers;

use App\Models\User as UserModel;
use App\Services\UserWordService;
use App\Services\RandomWordService;

class Auth extends BaseController
{
    /**
     * Display Login Form
     */
    public function loginForm()
    {
        helper(['form']);
        $userId = session()->get('userId');
        if($userId){
            return redirect()->to('/words');
        };

        echo view('/templates/header');
        echo view('welcome');
        echo view('/templates/footer');
    }

    /**
     * Handle User Login request
     * @param Request $request
     */
    public function login()
    {
        helper(['form']);
        $rules = [
            'firstname' => 'required',
            'lastname'  => 'required'
        ];

        $userId = session()->get('userId');

        if($userId){
            return redirect()->to('/words');
        }

        echo view('/templates/header');
        if($this->validate($rules)){
            $userModel = model(UserModel::class);

            $user = $userModel->where([
                'firstname'     => $this->request->getVar('firstname'),
                'lastname'    => $this->request->getVar('lastname'),
            ])->first();

            if(!$user){

                $data = [
                    'firstname'     => $this->request->getVar('firstname'),
                    'lastname'    => $this->request->getVar('lastname'),
                ];

                $userModel->save($data);
                session()->set(['userId' => $userModel->getInsertId(), 'isLoggedIn' => true]);
            }else{
                session()->set(['userId' => $user['id'], 'isLoggedIn' => true]);
            }

            return redirect()->to('/words');
        }else{
            $validation = $this->validator;
            echo view('words', compact('validation'));
        }
        
        echo view('/templates/footer');
    }

    /**
     * Logout a user
     * Invalidate a user session
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
