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
        // Check for specific admin session keys to prevent overlap with frontend user sessions
        if (!session()->get('isAdminLoggedIn') || session()->get('role_id') != 1) {
            return redirect()->to('/admin/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
