<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    public function insideActivities(Request $request)
    {
        $activities = Activity::where('type', 'inside')->get();
        $contents = [];
        foreach($activities as $activity){
            $contents[$activity->id] = file_get_contents(public_path().$activity->content_path);
        }
        return view('activities', ['spacific' => 'ພາຍໃນ', 'activities' => $activities, 'contents' => $contents]);
    }

    public function outsideActivities(Request $request)
    {
        $activities = Activity::where('type', 'outside')->get();
        $contents = [];
        foreach($activities as $activity){
            $contents[$activity->id] = file_get_contents(public_path().$activity->content_path);
        }
        return view('activities', ['spacific' => 'ພາຍນອກ', 'activities' => $activities, 'contents' => $contents]);
    }

    public function createInsideActivity()
    {
        return view('admin.add-activity', ['spacific' => 'ພາຍໃນ']);
    }

    public function createOutsideActivity()
    {
        return view('admin.add-activity', ['spacific' => 'ພາຍນອກ']);
    }

    public function storeActivity(Request $request)
    {
        $request->validate([
            'spacific' => ['required'],
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'major_id' => ['required']
        ]);
        $filename = Str::random(15).'.txt';
        Storage::disk('public')->put($filename, $request->content);
        if(Activity::create([
            'title' => $request->title,
            'content_path' => "/storage/$filename",
            'type' => $request->spacific == 'ພາຍໃນ'? 'inside' : 'outside',
            'major_id' => $request->major_id
        ])) return back()->with(['alert-message' => 'ເພີ່ມການເຄື່ອນໄຫວສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else return back()->with(['alert-message' => 'ເພີ່ມການເຄື່ອນໄຫວບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }

    public function store(Request $request)
    {

    }
}
