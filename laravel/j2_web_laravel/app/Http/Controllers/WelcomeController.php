<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function form()
    {
        return view('form');
    }

    public function post(Request $req)
    {
        $name = $req->get('name');

        return view('show', [
            'name' => $name
        ]);
    }
}
