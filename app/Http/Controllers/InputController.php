<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;


class InputController extends Controller
{
    public function show()
    {
        //ぞんざいな照会画面を表示する
        return Inertia::render('Input/Show');

    }

    public function edit()
    {
        // Gate::allowsだと指定された権限でアクセスが可能な場合、Gate::deniesだと指定された権限でアクセスできない場合になる
        if(Gate::denies('user')) {
            //ぞんざいな更新画面を表示する
            return Inertia::render('Input/Edit');
        } else {
            session()->flash('editmsg', 'あんた更新できないよ！！');
            return Inertia::render('Menu');
        }
    }
}
