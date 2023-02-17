<?php

namespace App\Controllers\admin;

use App\Controllers\Controller;
use App\Models\UserModel;

class UserController extends Controller
{
  public function index()
  {
    $users = UserModel::all();
    return $this->view('backend/users/list', ['users' => $users]);
  }
}
