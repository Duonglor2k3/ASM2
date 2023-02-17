<?php

namespace App\Controllers\admin;

use App\Controllers\Controller;



class HomeController extends Controller
{
    public function index()
    {
        $this->view('backend/dashboard', []);
    }
}
