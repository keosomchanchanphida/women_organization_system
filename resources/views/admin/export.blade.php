<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eport</title>
    <style>
        @font-face {
            font-family: 'Phetsarath OT';
            src: url({{ storage_path('fonts/Phetsarath OT.ttf') }}) format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'Phetsarath OT';
            src: url({{ storage_path('fonts/Phetsarath OT Bold.ttf') }}) format('truetype');
            font-weight: 300;
            font-style: bold;
        }
        html{
            font-size: {{ $fontSize ?? '8' }}px;
        }
        *{
            font-family: 'Phetsarath OT';
            margin: 0px;
            padding: 0px;
        }
        *:not(html){
            font-size: 1rem;
        }
        body{margin: 1rem;}
        table{ border: 1px solid black; border-collapse: collapse; margin: auto; }
        th, td{ border: 1px solid black; padding-left: .3rem; padding-right: .3rem;}
    </style>
</head>
<body>
    <table>
        <tr>
            @if($id) <th>ລະຫັດ</th> @endif
            @if($name) <th>ຊື່</th> @endif
            @if($lastname) <th>ນາມສະກຸນ</th> @endif
            @if($date_of_birth) <th>ວັນເດືອນປີ<br>ເກີດ</th> @endif
            @if($date_joined_women_union) <th>ວັນເດືອນປີ<br>ເຂົ້າເພດຍິງ</th> @endif
            @if($date_joined_youth_union) <th>ວັນເດືອນປີ<br>ເຂົ້າຊາວໜຸ່ມ</th> @endif
            @if($date_joined_trade_union) <th>ວັນເດືອນປີ<br>ເຂົ້າກໍາມະບານ</th> @endif
            @if($date_joined_political_party) <th>ວັນເດືອນປີ<br>ເຂົ້າອົງການຈັດຕັ້ງພັກ</th> @endif
            @if($village_of_birth) <th>ບ້ານເກີດ</th> @endif
            @if($living_village) <th>ບ້ານຢູ່ປັດຈຸບັນ</th> @endif
            @if($tribe) <th>ຊົນເຜົ່າ</th> @endif
            @if($religious) <th>ສາສາໜາ</th> @endif
            @if($major) <th>ພາກວິຊາ</th> @endif
            @if($education) <th>ລະດັບການສຶກສາ</th> @endif
            @if($career) <th>ອາຊີບ</th> @endif
            @if($state_position) <th>ຕໍາແໜ່ງ<br>ທາງລັດ</th> @endif
            @if($political_position) <th>ຕໍາແໜ່ງ<br>ທາງພັກ</th> @endif
            @if($graduated_place) <th>ຈົບຈາກ</th> @endif
            @if($status) <th>ສະຖານະ</th> @endif
            @if($phone_number) <th>ເບີໂທ</th> @endif
            @if($duty) <th>ໜ້າທີ</th> @endif
        </tr>
        @foreach ($members as $member)
            <tr>
                @if($id) <td>{{ $member->id }}</td> @endif
                @if($name) <td>{{ $member->name }}</td> @endif
                @if($lastname) <td>{{ $member->lastname }}</td> @endif
                @if($date_of_birth) <td>{{ $member->date_of_birth }}</td> @endif
                @if($date_joined_women_union) <td>{{ $member->date_joined_women_union }}</td> @endif
                @if($date_joined_youth_union) <td>{{ $member->date_joined_youth_union }}</td> @endif
                @if($date_joined_trade_union) <td>{{ $member->date_joined_trade_union }}</td> @endif
                @if($date_joined_political_party) <td>{{ $member->date_joined_political_party }}</td> @endif
                @if($village_of_birth) <td>{{ $member->placeOfBirth->name }}</td> @endif
                @if($living_village) <td>{{ $member->livingPlace->name }}</td> @endif
                @if($tribe) <td>{{ $member->tribe->name }}</td> @endif
                @if($religious) <td>{{ $member->religious->name }}</td> @endif
                @if($major) <td>{{ $member->major->name }}</td> @endif
                @if($education) <td>{{ $member->education->level }}</td> @endif
                @if($career) <td>{{ $member->career->career }}</td> @endif
                @if($state_position) <td>{{ $member->statePosition->position }}</td> @endif
                @if($political_position) <td>{{ $member->politicalPosition? $member->politicalPosition->position:'' }}</td> @endif
                @if($graduated_place) <td>{{ $member->graduatedPlace->name }}</td> @endif
                @if($status) <td>{{ $member->status->status }}</td> @endif
                @if($phone_number) <td>{{ $member->phone_number }}</td> @endif
                @if($duty) <td>{{ $member->duty->duty }}</th> @endif
            </tr>
        @endforeach
    </table>
</body>
</html>
