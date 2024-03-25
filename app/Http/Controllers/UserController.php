<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $flights = Flight::all();
        return view('User.dashboard', compact('flights'));
    }

}
