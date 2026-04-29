<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function submitLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = model(UserModel::class)->findByEmailAndPassword($email, $password);
        if (! $user) {
            return redirect()->back()->with('error', 'L’email/mot de passe est invalide')->withInput();
        }

        session()->set('user', $user);
        return redirect('etudiants');
    }
}
