<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDetailDataKursusController extends Controller
{
    public function show($id)
    {
        return view('user.detailDataKursus', ['id' => $id]);
    }
}
