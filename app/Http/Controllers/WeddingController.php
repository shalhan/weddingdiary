<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeddingController extends Controller
{
    private  $views = [
        1 => 'pages.wedding.create.couple',
        2 => 'pages.wedding.create.wedding',
        3 => 'pages.wedding.create.photo',
        4 => 'pages.wedding.create.gallery',
    ];

    public function showIndex() {
        return view("pages.wedding.index");
    }

    public function showCreate(Request $req) {
        if(!isset($req->step) || $req->step < 1 || $req->step > 4)
            $step = 1;  
        else
            $step = $req->step;

        return view($this->views[$step]);
    }
}
