<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $allowedRoles = [];
        foreach ($arguments as $roleName) {
            switch ($roleName) {
                case 'admin':
                    $allowedRoles[] = 1;
                    break;
            }
        }
        if (!session()->get('isAdminLoggedIn') || !in_array(session()->get('role_id'), $allowedRoles)) {
            return redirect()->to('/admin');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
