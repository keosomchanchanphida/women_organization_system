<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\District;
use App\Models\Duty;
use App\Models\Education;
use App\Models\GraduatedPlace;
use App\Models\Major;
use App\Models\Member;
use App\Models\PoliticalPosition;
use App\Models\Province;
use App\Models\Religious;
use App\Models\StatePosition;
use App\Models\Status;
use App\Models\Tribe;
use App\Models\User;
use App\Models\Village;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'LeoDesu',
            'email' => 'lioboy11@gmail.com',
            'password' => Hash::make('password')
        ]);
        $province = Province::create(['name' => 'ສະຫວັນນະເຂດ']);
        $district = District::create([
            'name' => 'ໄກສອນ ພົມວິຫານ',
            'province_id' => $province->id
        ]);
        $village =  Village::create([
            'name' => 'ໂພນສະຫວ່າງໃຕ້',
            'district_id' => $district->id
        ]);
        $tribe = Tribe::create(['name' => 'ລາວ']);
        $religious = Religious::create(['name' => 'ພຸດ']);
        $education = Education::create(['level' => 'ປະລິນຍາຕີ']);
        $career = Career::create(['career' => 'ພະນັກງານ']);
        $statePosition = StatePosition::create(['position' => 'ອາຈານສອນ']);
        $major = Major::create(['name' => 'ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ']);
        $graduatedPlace = GraduatedPlace::create(['name' => 'ມະຫາວິທະຍາໄລສະຫວັນນະເຂດ']);
        $status = Status::create(['status' => 'ໂສດ']);
        $duty = Duty::create(['duty' => 'ສະມາຊິກ']);

        Member::create([
            'name' => 'ນ. ກ',
            'lastname' => 'ຂ',
            'date_of_birth' => Date::now()->format('Y-m-d'),
            'date_joined_women_union' => Date::now()->format('Y-m-d'),
            'date_joined_youth_union' => Date::now()->format('Y-m-d'),
            'date_joined_trade_union' => Date::now()->format('Y-m-d'),
            'date_joined_political_party' => Date::now()->format('Y-m-d'),
            'place_of_birth_id' => $village->id,
            'living_place_id' => $village->id,
            'tribe_id' => $tribe->id,
            'religious_id' => $religious->id,
            'major_id' => $major->id,
            'education_id' => $education->id,
            'career_id' => $career->id,
            'state_position_id' => $statePosition->id,
            'graduated_place_id' => $graduatedPlace->id,
            'status_id' => $status->id,
            'phone_number' => 12345678,
            'duty_id' => $duty->id
        ]);
    }
}
