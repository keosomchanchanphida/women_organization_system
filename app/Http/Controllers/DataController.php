<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\District;
use App\Models\Duty;
use App\Models\Education;
use App\Models\GraduatedPlace;
use App\Models\Major;
use App\Models\PoliticalPosition;
use App\Models\Province;
use App\Models\Religious;
use App\Models\StatePosition;
use App\Models\Status;
use App\Models\Tribe;
use App\Models\Village;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function addProvinceForm()
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
    public function addDistrictForm()
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
    public function addVillageForm()
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
    public function addTribeForm()
    {
        return view('admin.adddata', [
            'title' => 'ເພີ່ມຊົນເຜົ່າ',
            'action' => route('add-tribe'),
            'fields' => [
                'ຊື່ຊົນເຜົ່າ' => 'name'
            ],
            'submit' => 'ເພີ່ມ'
        ]);
    }
    public function addTribe(Request $request)
    {
        $request->validate(
            ['name' => ['required', 'unique:tribes,name']],
            ['name.required' => 'ທ່ານຕ້ອງປ້ອນຊື່ຊົນເຜົ່າກ່ອນ',
            'name.unique' => 'ຊື່ຊົນເຜົ່າຕ້ອງບໍ່ຊໍ້າກັນ']
        );
        if(Tribe::create(['name' => $request->name]))
            return back()->with(['alert-message' => 'ເພີ່ມຊົນເຜົ່າສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ເພິ່ມຊົນເຜົ່າບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }
    public function addReligiousForm()
    {
        return view('admin.adddata', [
            'title' => 'ເພີ່ມສາສະໜາ',
            'action' => route('add-religious'),
            'fields' => [
                'ຊື່ສາສະໜາ' => 'name'
            ],
            'submit' => 'ເພີ່ມ'
        ]);
    }
    public function addReligious(Request $request)
    {
        $request->validate(
            ['name' => ['required', 'unique:religiouses,name']],
            ['name.required' => 'ທ່ານຕ້ອງປ້ອນຊື່ສາສະໜາກ່ອນ',
            'name.unique' => 'ຊື່ສາສະໜາຕ້ອງບໍ່ຊໍ້າກັນ']
        );
        if(Religious::create(['name' => $request->name]))
            return back()->with(['alert-message' => 'ເພີ່ມສາສະໜາສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ເພິ່ມສາສະໜາບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }
    public function addMajorForm()
    {
        return view('admin.adddata', [
            'title' => 'ເພີ່ມພາກວິຊາ',
            'action' => route('add-major'),
            'fields' => [
                'ຊື່ພາກວິຊາ' => 'name'
            ],
            'submit' => 'ເພີ່ມ'
        ]);
    }
    public function addMajor(Request $request)
    {
        $request->validate(
            ['name' => ['required', 'unique:majors,name']],
            ['name.required' => 'ທ່ານຕ້ອງປ້ອນຊື່ພາກວິຊາກ່ອນ',
            'name.unique' => 'ຊື່ພາກວິຊາຕ້ອງບໍ່ຊໍ້າກັນ']
        );
        if(Major::create(['name' => $request->name]))
            return back()->with(['alert-message' => 'ເພີ່ມພາກວິຊາສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ເພິ່ມພາກວິຊາບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }
    public function addEducationForm()
    {
        return view('admin.adddata', [
            'title' => 'ເພີ່ມລະດັບການສຶກສາ',
            'action' => route('add-education'),
            'fields' => [
                'ຊື່ລະດັບການສຶກສາ' => 'level'
            ],
            'submit' => 'ເພີ່ມ'
        ]);
    }
    public function addEducation(Request $request)
    {
        $request->validate(
            ['level' => ['required', 'unique:educations,level']],
            ['level.required' => 'ທ່ານຕ້ອງປ້ອນຊື່ລະດັບການສຶກສາກ່ອນ',
            'level.unique' => 'ຊື່ລະດັບການສຶກສາຕ້ອງບໍ່ຊໍ້າກັນ']
        );
        if(Education::create(['level' => $request->level]))
            return back()->with(['alert-message' => 'ເພີ່ມລະດັບການສຶກສາສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ເພິ່ມລະດັບການສຶກສາບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }
    public function addCareerForm()
    {
        return view('admin.adddata', [
            'title' => 'ເພີ່ມອາຊີບ',
            'action' => route('add-career'),
            'fields' => [
                'ຊື່ອາຊີບ' => 'career'
            ],
            'submit' => 'ເພີ່ມ'
        ]);
    }
    public function addCareer(Request $request)
    {
        $request->validate(
            ['career' => ['required', 'unique:careers,career']],
            ['career.required' => 'ທ່ານຕ້ອງປ້ອນຊື່ອາຊີບກ່ອນ',
            'career.unique' => 'ຊື່ອາຊີບຕ້ອງບໍ່ຊໍ້າກັນ']
        );
        if(Career::create(['career' => $request->career]))
            return back()->with(['alert-message' => 'ເພີ່ມອາຊີບສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ເພິ່ມອາຊີບບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }
    public function addStatePositionForm()
    {
        return view('admin.adddata', [
            'title' => 'ເພີ່ມຕໍາແໜ່ງທາງລັດ',
            'action' => route('add-state-position'),
            'fields' => [
                'ຊື່ຕໍາແໜ່ງທາງລັດ' => 'position'
            ],
            'submit' => 'ເພີ່ມ'
        ]);
    }
    public function addStatePosition(Request $request)
    {
        $request->validate(
            ['position' => ['required', 'unique:state_positions,position']],
            ['position.required' => 'ທ່ານຕ້ອງປ້ອນຊື່ຕໍາແໜ່ງທາງລັດກ່ອນ',
            'position.unique' => 'ຊື່ຕໍາແໜ່ງທາງລັດຕ້ອງບໍ່ຊໍ້າກັນ']
        );
        if(StatePosition::create(['position' => $request->position]))
            return back()->with(['alert-message' => 'ເພີ່ມຕໍາແໜ່ງທາງລັດສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ເພິ່ມຕໍາແໜ່ງທາງລັດບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }
    public function addPoliticalPositionForm()
    {
        return view('admin.adddata', [
            'title' => 'ເພີ່ມຕໍາແໜ່ງທາງພັກ',
            'action' => route('add-political-position'),
            'fields' => [
                'ຊື່ຕໍາແໜ່ງທາງພັກ' => 'position'
            ],
            'submit' => 'ເພີ່ມ'
        ]);
    }
    public function addPoliticalPosition(Request $request)
    {
        $request->validate(
            ['position' => ['required', 'unique:political_positions,position']],
            ['position.required' => 'ທ່ານຕ້ອງປ້ອນຊື່ຕໍາແໜ່ງທາງພັກກ່ອນ',
            'position.unique' => 'ຊື່ຕໍາແໜ່ງທາງພັກຕ້ອງບໍ່ຊໍ້າກັນ']
        );
        if(PoliticalPosition::create(['position' => $request->position]))
            return back()->with(['alert-message' => 'ເພີ່ມຕໍາແໜ່ງທາງພັກສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ເພິ່ມຕໍາແໜ່ງທາງພັກບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }
    public function addGraduatedPlaceForm()
    {
        return view('admin.adddata', [
            'title' => 'ເພີ່ມສະຖານທີ່ຈົບການສຶກສາ',
            'action' => route('add-graduated-place'),
            'fields' => [
                'ຊື່ສະຖານທີ່ຈົບການສຶກສາ' => 'name'
            ],
            'submit' => 'ເພີ່ມ'
        ]);
    }
    public function addGraduatedPlace(Request $request)
    {
        $request->validate(
            ['name' => ['required', 'unique:graduated_places,name']],
            ['name.required' => 'ທ່ານຕ້ອງປ້ອນຊື່ສະຖານທີ່ຈົບການສຶກສາກ່ອນ',
            'name.unique' => 'ຊື່ສະຖານທີ່ຈົບການສຶກສາຕ້ອງບໍ່ຊໍ້າກັນ']
        );
        if(GraduatedPlace::create(['name' => $request->name]))
            return back()->with(['alert-message' => 'ເພີ່ມສະຖານທີ່ຈົບການສຶກສາສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ເພິ່ມສະຖານທີ່ຈົບການສຶກສາບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }
    public function addStatusForm()
    {
        return view('admin.adddata', [
            'title' => 'ເພີ່ມສະຖານະ',
            'action' => route('add-status'),
            'fields' => [
                'ຊື່ສະຖານະ' => 'status'
            ],
            'submit' => 'ເພີ່ມ'
        ]);
    }
    public function addStatus(Request $request)
    {
        $request->validate(
            ['status' => ['required', 'unique:statuses,status']],
            ['status.required' => 'ທ່ານຕ້ອງປ້ອນຊື່ສະຖານະກ່ອນ',
            'status.unique' => 'ຊື່ສະຖານະຕ້ອງບໍ່ຊໍ້າກັນ']
        );
        if(Status::create(['status' => $request->status]))
            return back()->with(['alert-message' => 'ເພີ່ມສະຖານະສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ເພິ່ມສະຖານະບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }
    public function addDutyForm()
    {
        return view('admin.adddata', [
            'title' => 'ເພີ່ມໜ້າທີ່',
            'action' => route('add-duty'),
            'fields' => [
                'ຊື່ໜ້າທີ່' => 'duty'
            ],
            'submit' => 'ເພີ່ມ'
        ]);
    }
    public function addDuty(Request $request)
    {
        $request->validate(
            ['duty' => ['required', 'unique:duties,duty']],
            ['duty.required' => 'ທ່ານຕ້ອງປ້ອນຊື່ໜ້າທີ່ກ່ອນ',
            'duty.unique' => 'ຊື່ໜ້າທີ່ຕ້ອງບໍ່ຊໍ້າກັນ']
        );
        if(Duty::create(['duty' => $request->duty]))
            return back()->with(['alert-message' => 'ເພີ່ມໜ້າທີ່ສໍາເລັດແລ້ວ', 'alert-class' => 'alert-success']);
        else
            return back()->with(['alert-message' => 'ເພິ່ມໜ້າທີ່ບໍ່ສໍາເລັດ', 'alert-class' => 'alert-danger']);
    }
}
