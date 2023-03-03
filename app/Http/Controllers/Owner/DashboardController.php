<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
class DashboardController extends Controller
{
    public function index(){
    // dd(Hash::make('123456'));
        return view('owner.dashboard');
    }
}
