<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Major;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $activities = Activity::orderBy('created_at', 'desc')->limit(20)->get();
        foreach($activities as $activity){
            try{
                $activity->content = file_get_contents(public_path().$activity->content_path);
            }catch(Exception $e){
                $activity->content = '';
            }
        }
        return view('welcome', compact('activities'));
    }
}
