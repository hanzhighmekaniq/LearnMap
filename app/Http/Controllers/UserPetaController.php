<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPetaController extends Controller
{
    public function index()
    {
        return view('user.peta');
    }
}
