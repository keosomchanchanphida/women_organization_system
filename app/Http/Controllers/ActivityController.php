<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    public function insideActivities(Request $request)
    {
        $activities = Activity::where('type', 'inside')->orderBy('created_at', 'desc')->get();
        foreach($activities as $activity){
            try{
                $activity->content = file_get_contents(public_path().$activity->content_path);
            }catch(Exception $e){
                $activity->content = '';
            }
        }
        return view('activities', ['type' => 'ພາຍໃນ', 'activities' => $activities]);
    }

    public function outsideActivities(Request $request)
    {
        $activities = Activity::where('type', 'outside')->orderBy('created_at', 'desc')->get();
        foreach($activities as $activity){
            try{
                $activity->content = file_get_contents(public_path().$activity->content_path);
            }catch(Exception $e){
                $activity->content = '';
            }
        }
        return view('activities', ['type' => 'ພາຍນອກ', 'activities' => $activities]);
    }

    public function createInsideActivity()
    {
        return view('admin.add-activity', ['type' => 'ພາຍໃນ']);
    }

    public function createOutsideActivity()
    {
        return view('admin.add-activity', ['type' => 'ພາຍນອກ']);
    }

    public function storeActivity(Request $request)
    {
        $request->validate([
            'type' => ['required'],
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'major_id' => ['required']
        ]);
        $filename = Str::random(15).'.txt';
        Storage::disk('public')->put($filename, $request->content);
        if($activity = Activity::create([
            'title' => $request->title,
            'content_path' => "/storage/$filename",
            'type' => $request->type == 'ພາຍໃນ'? 'inside' : 'outside',
            'major_id' => $request->major_id
        ])){
            $images = $request->images;
            $descriptions = $request->descriptions;
            $size = count($images);
            for($i=0; $i<$size; $i++){
                if($images[$i]){
                    $image_path = '/storage/'.$images[$i]->store('', 'public');
                    $description_filename = null;
                    if($descriptions[$i]){
                        try{
                            $description_filename = Str::random(20).'txt';
                            Storage::disk('public')->put($description_filename, $descriptions[$i]);
                        }catch(\Exception $e){ }
                    }
                    $activity->images()->create([
                        'image_path' => $image_path,
                        'image_description_path' => $description_filename?'/storage/'.$description_filename:null
                    ]);
                }
            }
            return back()->with(['alert-message' => 'ເພີ່ມການເຄື່ອນໄຫວສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        }
        else{
            try{
                unlink(public_path().'/storage/'.$filename);
            }catch(\Exception $e){ }
            return back()->with(['alert-message' => 'ເພີ່ມການເຄື່ອນໄຫວບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
        }
    }

    public function show(Activity $activity)
    {
        try{
            $activity->content = file_get_contents(public_path().$activity->content_path);
        }catch(Exception $e){
            $activity->content = '';
        }
        foreach($activity->images as $image){
            try{
                $image->description = file_get_contents(public_path().$image->image_description_path);
            }catch(\Exception $e){
                $image->description = '';
            }
        }
        return view('activity', compact('activity'));
    }

    public function edit(Activity $activity)
    {
        try{
            $activity->content = file_get_contents(public_path().$activity->content_path);
        }catch(Exception $e){
            $activity->content = '';
        }
        foreach($activity->images as $image){
            try{
                $image->description = file_get_contents(public_path().$image->image_description_path);
            }catch(\Exception $e){
                $image->description = '';
            }
        }
        return view('admin.edit-activity', compact('activity'));
    }

    public function update(Activity $activity, Request $request)
    {
        $request->validate([
            'type' => ['required'],
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'major_id' => ['required']
        ]);
        $filename = Str::random(15).'.txt';
        Storage::disk('public')->put($filename, $request->content);
        try {
            unlink(public_path().$activity->content_path);
        } catch (\Throwable $e) { }
        if($activity->update([
            'title' => $request->title,
            'content_path' => "/storage/$filename",
            'type' => $request->type,
            'major_id' => $request->major_id
        ])){
            $images = $request->images;
            $ids = $request->image_ids;
            $oldImages = $request->old_image_paths;
            $descriptions = $request->descriptions;
            foreach($request->length as $i => $v){
                //check if the image is new or is changed
                //TODO: trigger update even there's only description changed
                if(isset($images[$i]) && !$oldImages[$i]){
                    //if image is changed
                    if($image = $activity->images->find($ids[$i])){
                        try { unlink(public_path().$image->image_path); } catch (\Throwable $e) { }
                        try { unlink(public_path().$image->image_description_path); } catch (\Throwable $e) { }
                        $image_path = '/storage/'.$images[$i]->store('', 'public');
                        $description_filename = null;
                        if($descriptions[$i]){
                            try{
                                $description_filename = Str::random(20).'txt';
                                Storage::disk('public')->put($description_filename, $descriptions[$i]);
                            }catch(\Exception $e){ }
                        }
                        $image->update([
                            'image_path' => $image_path,
                            'image_description_path' => $description_filename?'/storage/'.$description_filename:null
                        ]);
                    }
                    //if image is new
                    else{
                        $image_path = '/storage/'.$images[$i]->store('', 'public');
                        $description_filename = null;
                        if($descriptions[$i]){
                            try{
                                $description_filename = Str::random(20).'txt';
                                Storage::disk('public')->put($description_filename, $descriptions[$i]);
                            }catch(\Exception $e){ }
                        }
                        $activity->images()->create([
                            'image_path' => $image_path,
                            'image_description_path' => $description_filename?'/storage/'.$description_filename:null
                        ]);
                    }
                }
                //if image being deleted
                if(!isset($images[$i]) && !$oldImages[$i]){
                    if($image = $activity->images->find($ids[$i])){
                        try { unlink(public_path().$image->image_path); } catch (\Throwable $e) { }
                        try { unlink(public_path().$image->image_description_path); } catch (\Throwable $e) { }
                        $image->delete();
                    }
                }
            }
            return back()->with(['alert-message' => 'ແກ້ໄຂການເຄື່ອນໄຫວສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        }
        else{
            try{
                unlink(public_path().'/storage/'.$filename);
            }catch(\Exception $e){ }
            return back()->with(['alert-message' => 'ແກ້ໄຂການເຄື່ອນໄຫວບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
        }
    }
}
