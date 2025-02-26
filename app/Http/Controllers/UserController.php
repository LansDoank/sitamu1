<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitType;

class UserController extends Controller
{
    public function index () {
        return view('user.index',['title' => 'Sitamu']);
    }

}
