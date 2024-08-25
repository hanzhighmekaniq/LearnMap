<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDetailDataKursusController extends Controller
{
    public function index()
    {
        return view('user.detailKursus');
    }
}
