<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showIndex() {
        return view("pages.dashboard.index");
    }
}
