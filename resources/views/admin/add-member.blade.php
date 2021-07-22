@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ເພີ່ມສະມາຊິກ</div>

                <div class="card-body">
                    <form action="/store-member" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ຊື່:</label>
                            <div class="col-md-6">
                                <input name="name" id="name" class="form-control @error('name') is-invalid @enderror"/>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">ນາມສະກຸນ:</label>
                            <div class="col-md-6">
                                <input name="lastname" id="lastname" class="form-control @error('lastname') is-invalid @enderror"/>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">ວັນເດືອນປີເກີດ:</label>
                            <div class="col-md-6">
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror"/>
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_joined_women_union" class="col-md-4 col-form-label text-md-right">ວັນເດືອນປີເຂົ້າເປັນ<br>ສະມາຊິກເພດຍິງ:</label>
                            <div class="col-md-6 row m-0 align-items-center">
                                <input type="date" name="date_joined_women_union" id="date_joined_women_union" class="form-control col-12 @error('date_joined_women_union') is-invalid @enderror"/>
                                @error('date_joined_women_union')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_joined_youth_union" class="col-md-4 col-form-label text-md-right">ວັນເດືອນປີເຂົ້າເປັນ<br>ສະມາຊິກຊາວໜຸ່ມ:</label>
                            <div class="col-md-6 row m-0 align-items-center">
                                <input type="date" name="date_joined_youth_union" id="date_joined_youth_union" class="form-control col-12 @error('date_joined_youth_union') is-invalid @enderror"/>
                                @error('date_joined_youth_union')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_joined_trade_union" class="col-md-4 col-form-label text-md-right">ວັນເດືອນປີເຂົ້າເປັນ<br>ສະມາຊິກກໍາມະບານ:</label>
                            <div class="col-md-6 row m-0 align-items-center">
                                <input type="date" name="date_joined_trade_union" id="date_joined_trade_union" class="form-control col-12 @error('date_joined_trade_union') is-invalid @enderror"/>
                                @error('date_joined_trade_union')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_joined_political_party" class="col-md-4 col-form-label text-md-right">ວັນເດືອນປີເຂົ້າເປັນ<br>ສະມາຊິກພັກ:</label>
                            <div class="col-md-6 row m-0 align-items-center">
                                <input type="date" name="date_joined_political_party" id="date_joined_political_party" class="form-control col-12 @error('date_joined_political_party') is-invalid @enderror"/>
                                @error('date_joined_political_party')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <select-village label="ບ້ານເກີດ" name="place_of_birth_id" @error('place_of_birth_id') error="{{ $message }}" @enderror/>
                        </div>
                        <div class="form-group row">
                            <select-village label="ບ້ານຢູ່ປັດຈຸບັນ" name="living_place_id" @error('living_place_id') error="{{ $message }}" @enderror/>
                        </div>
                        <div class="form-group row">
                            <label for="tribe_id" class="col-md-4 col-form-label text-md-right">ຊົນເຜົ່າ:</label>
                            <div class="col-md-6">
                                <select name="tribe_id" id="tribe_id" class="form-control @error('tribe_id') is-invalid @enderror">
                                    @foreach (App\Models\Tribe::all() as $village)
                                        <option value="{{ $village->id }}">{{ $village->name }}</option>
                                    @endforeach
                                </select>
                                @error('tribe_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="{{ route('add-tribe-form') }}" class="btn btn-primary">ເພີ່ມ</a></div>
                        </div>
                        <div class="form-group row">
                            <label for="religious_id" class="col-md-4 col-form-label text-md-right">ສາສະໜາ:</label>
                            <div class="col-md-6">
                                <select name="religious_id" id="religious_id" class="form-control @error('religious_id') is-invalid @enderror">
                                    @foreach (App\Models\Religious::all() as $village)
                                        <option value="{{ $village->id }}">{{ $village->name }}</option>
                                    @endforeach
                                </select>
                                @error('religious_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="{{ route('add-religious-form') }}" class="btn btn-primary">ເພີ່ມ</a></div>
                        </div>
                        <div class="form-group row">
                            <label for="major_id" class="col-md-4 col-form-label text-md-right">ພາກວິຊາ:</label>
                            <div class="col-md-6">
                                <select name="major_id" id="major_id" class="form-control @error('major_id') is-invalid @enderror">
                                    @foreach (App\Models\Major::all() as $major)
                                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                                    @endforeach
                                </select>
                                @error('major_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="{{ route('add-major-form') }}" class="btn btn-primary">ເພີ່ມ</a></div>
                        </div>
                        <div class="form-group row">
                            <label for="education_id" class="col-md-4 col-form-label text-md-right">ລະດັບການສຶກສາ:</label>
                            <div class="col-md-6">
                                <select name="education_id" id="education_id" class="form-control @error('education_id') is-invalid @enderror">
                                    @foreach (App\Models\Education::all() as $education)
                                        <option value="{{ $education->id }}">{{ $education->level }}</option>
                                    @endforeach
                                </select>
                                @error('education_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="{{ route('add-education-form') }}" class="btn btn-primary">ເພີ່ມ</a href="{{ route('add-education-form') }}"></div>
                        </div>
                        <div class="form-group row">
                            <label for="career_id" class="col-md-4 col-form-label text-md-right">ອາຊີບ:</label>
                            <div class="col-md-6">
                                <select name="career_id" id="career_id" class="form-control @error('career_id') is-invalid @enderror">
                                    @foreach (App\Models\Career::all() as $career)
                                        <option value="{{ $career->id }}">{{ $career->career }}</option>
                                    @endforeach
                                </select>
                                @error('career_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="{{ route('add-career-form') }}" class="btn btn-primary">ເພີ່ມ</a></div>
                        </div>
                        <div class="form-group row">
                            <label for="state_position_id" class="col-md-4 col-form-label text-md-right">ຕໍາແໜ່ງທາງລັດ:</label>
                            <div class="col-md-6">
                                <select name="state_position_id" id="state_position_id" class="form-control @error('state_position_id') is-invalid @enderror">
                                    @foreach (App\Models\StatePosition::all() as $statePosition)
                                        <option value="{{ $statePosition->id }}">{{ $statePosition->position }}</option>
                                    @endforeach
                                </select>
                                @error('state_position_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="{{ route('add-state-position-form') }}" class="btn btn-primary">ເພີ່ມ</a></div>
                        </div>
                        <div class="form-group row">
                            <label for="political_position_id" class="col-md-4 col-form-label text-md-right">ຕໍາແໜ່ງທາງພັກ:</label>
                            <div class="col-md-6">
                                <select name="political_position_id" id="political_position_id" class="form-control @error('political_position_id') is-invalid @enderror">
                                    @foreach (App\Models\PoliticalPosition::all() as $politicalPosition)
                                        <option value="{{ $politicalPosition->id }}">{{ $politicalPosition->position }}</option>
                                    @endforeach
                                </select>
                                @error('political_position_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="{{ route('add-political-position-form') }}" class="btn btn-primary">ເພີ່ມ</a></div>
                        </div>
                        <div class="form-group row">
                            <label for="graduated_place_id" class="col-md-4 col-form-label text-md-right">ສະຖານທີ່ຈົບການສຶກສາ:</label>
                            <div class="col-md-6">
                                <select name="graduated_place_id" id="graduated_place_id" class="form-control @error('graduated_place_id') is-invalid @enderror">
                                    @foreach (App\Models\GraduatedPlace::all() as $place)
                                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                                    @endforeach
                                </select>
                                @error('graduated_place_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="{{ route('add-graduated-place-form') }}" class="btn btn-primary">ເພີ່ມ</a></div>
                        </div>
                        <div class="form-group row">
                            <label for="status_id" class="col-md-4 col-form-label text-md-right">ສະຖານະ:</label>
                            <div class="col-md-6">
                                <select name="status_id" id="status_id" class="form-control @error('status_id') is-invalid @enderror">
                                    @foreach (App\Models\Status::all() as $status)
                                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                                    @endforeach
                                </select>
                                @error('status_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="{{ route('add-status-form') }}" class="btn btn-primary">ເພີ່ມ</a></div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">ເບີໂທ:</label>
                            <div class="col-md-6">
                                <input name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror"/>
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="duty_id" class="col-md-4 col-form-label text-md-right">ໜ້າທີ່:</label>
                            <div class="col-md-6">
                                <select name="duty_id" id="duty_id" class="form-control @error('duty_id') is-invalid @enderror">
                                    @foreach (App\Models\Duty::all() as $duty)
                                        <option value="{{ $duty->id }}">{{ $duty->duty }}</option>
                                    @endforeach
                                </select>
                                @error('duty_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="{{ route('add-duty-form') }}" class="btn btn-primary">ເພີ່ມ</a></div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    ເພີ່ມສະມາຊິກ
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
