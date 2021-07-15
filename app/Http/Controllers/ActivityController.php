<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function insideActivities(Request $request)
    {
        return view('activities', ['spacific' => 'ພາຍໃນ']);
    }
    public function outsideActivities(Request $request)
    {
        return view('activities', ['spacific' => 'ພາຍນອກ']);
    }
    public function addInsideActivities(Request $request)
    {
        return view('admin.addactivity', ['spacific' => 'ພາຍໃນ']);
    }
    public function addOutsideActivities(Request $request)
    {
        return view('admin.addactivity', ['spacific' => 'ພາຍນອກ']);
    }
}
