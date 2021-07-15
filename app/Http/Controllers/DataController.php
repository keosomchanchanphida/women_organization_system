<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function addProvinceForm(Request $request)
    {
        return view('admin.adddata', [
            'title' => 'ເພີ່ມແຂວງ',
            'action' => route('add-province'),
            'fields' => [
                'ຊື່ແຂວງ' => 'name'
            ],
            'submit' => 'ເພີ່ມ'
        ]);
    }
    public function addProvince(Request $request)
    {
        $request->validate(
            ['name' => ['required', 'unique:provinces,name']],
            ['name.required' => 'ທ່ານຕ້ອງປ້ອນຊື່ແຂວງກ່ອນ',
            'name.unique' => 'ຊື່ແຂວງຕ້ອງບໍ່ຊໍ້າກັນ']
        );
        if(Province::create(['name' => $request->name]))
            return back()->with(['alert-message' => 'ເພີ່ມແຂວງສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ເພິ່ມແຂວງບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }
    public function addDistrictForm(Request $request)
    {
        return view('admin.adddistrict', [
            'title' => 'ເພີ່ມເມືອງ',
            'action' => route('add-district'),
            'fields' => [
                'ຊື່ເມືອງ' => 'name'
            ],
            'submit' => 'ເພີ່ມ'
        ]);
    }
    public function addDistrict(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:districts,name'],
            'province_id' => ['required']
        ],[
            'name.required' => 'ທ່ານຕ້ອງປ້ອນຊື່ເມືອງກ່ອນ',
            'province_id.required' => 'ທ່ານຕ້ອງເລືອກແຂວງກ່ອນ',
            'name.unique' => 'ຊື່ເມືອງຕ້ອງບໍ່ຊໍ້າກັນ'
        ]);
        if(District::create(['name' => $request->name, 'province_id' => $request->province_id]))
            return back()->with(['alert-message' => 'ເພີ່ມເມືອງສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ເພິ່ມເມືອງບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }
    public function addVillageForm(Request $request)
    {
        return view('admin.addvillage', [
            'title' => 'ເພີ່ມບ້ານ',
            'action' => route('add-village'),
            'fields' => [
                'ຊື່ບ້ານ' => 'name'
            ],
            'submit' => 'ເພີ່ມ'
        ]);
    }
    public function addVillage(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:villages,name'],
            'district_id' => ['required']
        ],[
            'name.required' => 'ທ່ານຕ້ອງປ້ອນຊື່ບ້ານກ່ອນ',
            'district_id.required' => 'ທ່ານຕ້ອງເລືອກເມືອງກ່ອນ',
            'name.unique' => 'ຊື່ບ້ານຕ້ອງບໍ່ຊໍ້າກັນ'
        ]);
        if(Village::create(['name' => $request->name, 'district_id' => $request->district_id]))
            return back()->with(['alert-message' => 'ເພີ່ມບ້ານສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ເພິ່ມບ້ານບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }
}
