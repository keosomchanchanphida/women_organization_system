<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('showmembers');
    }

    public function create(Request $request)
    {
        if($request->add)
            return view('addmember', [
                'alert' => $request->add == 'success' ? 'ເພີ່ມສາມາຊິກສໍາເລັດແລ້ວ' : 'ເພິ່ມສະມາຊິກບໍ່ສໍາເລັດ',
                'alertClass' => $request->add == 'success' ? 'alert-success' : 'alert-danger',
                'majors' => Major::all()
            ]);
        return view('addmember', [ 'majors' => Major::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'lastname' => ['required'],
            'date_of_birth' => ['required'],
            'date_joined_women_union' => ['required'],
            'date_joined_youth_union' => ['required'],
            'date_joined_trade_union' => ['required'],
            'date_joined_political_party' => ['required'],
            'place_of_birth_id' => ['required'],
            'living_place_id' => ['required'],
            'tribe_id' => ['required'],
            'religious_id' => ['required'],
            'major_id' => ['required'],
            'education_id' => ['required'],
            'career_id' => ['required'],
            'state_position_id' => ['required'],
            'graduated_place_id' => ['required'],
            'status_id' => ['required'],
            'phone_number' => ['required', 'numeric'],
            'duty_id' => ['required']
        ],[
            'name.required' => 'ທ່ານຈະຕ້ອງປ້ອນຊື່ກ່ອນ',
            'lastname.required' => 'ທ່ານຈະຕ້ອງປ້ອນນາມສະກຸນກ່ອນ',
            'date_of_birth.required' => 'ທ່ານຈະຕ້ອງປ້ອນວັນເດືອນປີເກີດກ່ອນ',
            'date_joined_women_union.required' => 'ທ່ານຈະຕ້ອງປ້ອນເວັນເດືອນປີເຂົ້າເປັນສະມາຊິກແມ່ຍິງກ່ອນ',
            'date_joined_youth_union.required' => 'ທ່ານຈະຕ້ອງປ້ອນວັນເດືອນປີເຂົ້າເປັນສະມາຊິກຊາວໜຸ່ມກ່ອນ',
            'date_joined_trade_union.required' => 'ທ່ານຈະຕ້ອງປ້ອນວັນເດືອນປີເຂົ້າເປັນສະມາຊິກກໍາມະບານກ່ອນ',
            'date_joined_political_party.required' => 'ທ່ານຈະຕ້ອງປ້ອນວັນເດືອນປີເຂົ້າເປັນສະມາຊິກພັກກ່ອນ',
            'place_of_birth_id.required' => 'ທ່ານຈະຕ້ອງປ້ອນສະຖານທີ່ເກີດໃຫ້ຄົບກ່ອນ',
            'living_place_id.required' => 'ທ່ານຈະຕ້ອງປ້ອນສະຖານທີ່ປັດຈຸບັນໃຫ້ຄົບກ່ອນ',
            'tribe_id.required' => 'ທ່ານຈະຕ້ອງປ້ອນຊົນເຜົ່າກ່ອນ',
            'religious_id.required' => 'ທ່ານຈະຕ້ອງປ້ອນສາສະໜາກ່ອນ',
            'major_id.required' => 'ທ່ານຈະຕ້ອງປ້ອນພາກວິຊາກ່ອນ',
            'education_id.required' => 'ທ່ານຈະຕ້ອງປ້ອນລະດັບການສຶກສາກ່ອນ',
            'career_id.required' => 'ທ່ານຈະຕ້ອງປ້ອນອາຊີບກ່ອນ',
            'state_position_id.required' => 'ທ່ານຈະຕ້ອງປ້ອນຕໍາແໜ່ງທາງລັດກ່ອນ',
            'graduated_place_id.required' => 'ທ່ານຈະຕ້ອງປ້ອນສະຖານທີ່ຈົບການສຶກສາກ່ອນ',
            'status_id.required' => 'ທ່ານຈະຕ້ອງປ້ອນສະຖານະກ່ອນ',
            'phone_number.required' => 'ທ່ານຈະຕ້ອງປ້ອນເບີໂທກ່ອນ',
            'phone_number.numeric' => 'ເບີໂທແມ່ນຕ້ອງເປັນຕົວເລກ',
            'duty_id.required' => 'ທ່ານຈະຕ້ອງປ້ອນໜ້າທີ່ກ່ອນ'
        ]);
        if($member = Member::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'date_of_birth' => $request->date_of_birth,
            'date_joined_women_union' => $request->date_joined_women_union,
            'date_joined_youth_union' => $request->date_joined_youth_union,
            'date_joined_trade_union' => $request->date_joined_trade_union,
            'date_joined_political_party' => $request->date_joined_political_party,
            'place_of_birth_id' => $request->place_of_birth_id,
            'living_place_id' => $request->living_place_id,
            'tribe_id' => $request->tribe_id,
            'religious_id' => $request->religious_id,
            'major_id' => $request->major_id,
            'education_id' => $request->education_id,
            'career_id' => $request->career_id,
            'state_position_id' => $request->state_position_id,
            'political_position_id' => $request->political_position_id,
            'graduated_place_id' => $request->graduated_place_id,
            'status_id' => $request->status_id,
            'phone_number' => $request->phone_number,
            'duty_id' => $request->duty_id
        ])) {
            return redirect("/add-member?add=success");
        }
        else {
            return redirect("/add-member?add=fail");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
