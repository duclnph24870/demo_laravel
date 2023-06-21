<?php

namespace App\Http\Controllers;
use App\Models\Users;

class HomeController extends Controller
{
    protected function index () {
        $users = Users::find(2);
        return $users->group;
        // return $users;
    }
}
