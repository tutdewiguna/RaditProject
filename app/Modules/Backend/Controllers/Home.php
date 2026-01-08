<?php

namespace Backend\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('Backend\Views\home');
    }
}
