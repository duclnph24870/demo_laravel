<?php

namespace App\Http\Controllers;
use App\Models\Users;
use App\Http\Resources\UserResource;

class HomeController extends Controller
{
    protected function index () {
        $users = Users::find(2);
        $result = new UserResource($users);
        return $result;
        // return $users;
    }
}
