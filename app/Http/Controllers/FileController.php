<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return view('files', ['files' => File::orderBy('name', 'asc')->get()]);
    }

    public function create()
    {
        return view('admin.add-file');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'file' => ['required']
        ],[
            'name.required' => 'ທ່ານຕ້ອງໃສ່ຊື່ໄຟລ໌ໃນສະແດງກ່ອນ',
            'file.required' => 'ທ່ານຕ້ອງເລືອກໄຟລ໌ກ່ອນ'
        ]);
        $file_path = '/storage/'.$request->file('file')->store('', 'public');

        if(File::create(['name' => $request->name, 'file_path' => $file_path]))
            return redirect(route("all-files"))->with(['alert-message' => 'ເພີ່ມຂໍ້ມູນສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ເພີ່ມຂໍ້ມູນບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }

    public function edit(File $file)
    {
        return view('admin.edit-file', compact('file'));
    }

    public function update(File $file, Request $request)
    {
        $request->validate([
            'name' => ['required']
        ],[
            'name.required' => 'ທ່ານຕ້ອງໃສ່ຊື່ໄຟລ໌ໃນສະແດງກ່ອນ'
        ]);
        $file_path = null;
        if($request->file('file'))
            $file_path = '/storage/'.$request->file('file')->store('', 'public');

        if($file->update(['name' => $request->name, 'file_path' => $file_path ? $file_path : $file->file_path]))
            return redirect(route("all-files"))->with(['alert-message' => 'ແກ້ໄຂຂໍ້ມູນສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ແກ້ໄຂຂໍ້ມູນບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }

    public function destroy(File $file)
    {
        if($file->delete()) return redirect(route("all-files"))->with(['alert-message' => 'ລົບຂໍ້ມູນສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else return back()->with(['alert-message' => 'ລົບຂໍ້ມູນບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }
}
