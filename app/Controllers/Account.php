<?php

namespace App\Controllers;

// use App\Models\PagesModel;

class Account extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => "Login"
        ];

        return view('login' ,$data);
    }
}
