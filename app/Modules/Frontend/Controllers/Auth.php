<?php

namespace Frontend\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        return view('Frontend\Views\register');
    }

    public function attemptRegister()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email]'
            ],
            'name' => [
                'label' => 'Name',
                'rules' => 'required|alpha_space'
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]'
            ],
            'confirmpassword' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]'
            ]
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        $userModel->save([
            'email'     => $this->request->getPost('email'),
            'name'     => $this->request->getPost('name'),
            'role_id'  => 2,
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
    }

    public function login()
    {
        return view('Frontend\Views\login');
    }

    public function attemptLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'isUserLoggedIn' => true,
                'userId' => $user['id'],
                'email' => $user['email'],
                'name' => $user['name'] ?? '',
                'role_id' => $user['role_id'] ?? '',
            ]);

            return redirect()->to('/');

        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
