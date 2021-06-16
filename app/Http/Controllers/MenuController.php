<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function menu()
    {
        return Inertia::render('Menu', ['user' => Auth::user() ]);
    }

    public function secret()
    {
        return Inertia::render('Secret');
    }
}
