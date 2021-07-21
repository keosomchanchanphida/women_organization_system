@extends('layouts.app')
@section('title', 'ສະມາຊິກ')
@section('content')
<div class="pt-md-2 pl-md-2 pr-md-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('ສະມາຊິກ') }}</div>

                <div class="card-body overflow-scroll p-0">
                    <table class="table table-bordered">
                        <tr>
                            @foreach ([
                                'ລະຫັດ',
                                'ຊື່',
                                'ນາມສະກຸນ',
                                'ວັນເດືອນປີ ເກີດ',
                                'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກ',
                                'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກຊາວໜຸ່ມ',
                                'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກກໍາມະບານ',
                                'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກພັກ',
                                'ບ້ານເກີດ',
                                'ບ້ານຢູ່',
                                'ຊົນເຜົ່າ',
                                'ສາສະໜາ',
                                'ພາກວິຊາ',
                                'ລະດັບການສຶກສາ',
                                'ອາຊີບ',
                                'ຕໍາແໜ່ງທາງລັດ',
                                'ຕໍາແໜ່ງທາງພັກ',
                                'ຈົບຈາກ',
                                'ສະຖານະ',
                                'ເບີໂທ',
                                'ໜ້າທີ່'
                            ] as $field)
                                <th class="text-center">{{ $field }}</td>
                            @endforeach
                        </tr>
                        @foreach (App\Models\Member::all() as $member)
                            <tr onclick="window.open('/edit-member/{{ $member->id }}', '_self')"  class="cursor-pointer">
                                <td>{{ $member->id }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->lastname }}</td>
                                <td>{{ $member->date_of_birth }}</td>
                                <td>{{ $member->date_joined_women_union }}</td>
                                <td>{{ $member->date_joined_youth_union }}</td>
                                <td>{{ $member->date_joined_trade_union }}</td>
                                <td>{{ $member->date_joined_political_party }}</td>
                                <td>{{ $member->placeOfBirth->name }}</td>
                                <td>{{ $member->livingPlace->name }}</td>
                                <td>{{ $member->tribe->name }}</td>
                                <td>{{ $member->religious->name }}</td>
                                <td>{{ $member->major->name }}</td>
                                <td>{{ $member->education->level }}</td>
                                <td>{{ $member->career->career }}</td>
                                <td>{{ $member->statePosition?->position }}</td>
                                <td>{{ $member->politicalPosition?->position }}</td>
                                <td>{{ $member->graduatedPlace->name }}</td>
                                <td>{{ $member->status->status }}</td>
                                <td>{{ $member->phone_number }}</td>
                                <td>{{ $member->duty->duty }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
