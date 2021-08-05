<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Major;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $activities = Activity::orderBy('created_at', 'desc')->get();
        return view('welcome');
    }
}
