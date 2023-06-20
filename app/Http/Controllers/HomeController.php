<?php

namespace App\Http\Controllers;
use App\Models\Users;

class HomeController extends Controller
{
    protected function index () {
        $users = Users::getAllUsers();
        return $users;
    }
}
