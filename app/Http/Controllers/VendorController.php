<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function showProfile() {
        return view('pages.profile.index');
    }
}
