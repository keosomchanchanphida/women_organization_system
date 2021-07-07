@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ເພີ່ມສະມາຊິກ') }}</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="major" class="col-md-4 col-form-label text-md-right">{{ __('ພາກວິຊາ:') }}</label>

                        <div class="col-md-6">
                            <select name="major" id="major" class="form-control @error('major') is-invalid @enderror">
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                                @endforeach
                            </select>
                            @error('major')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary">ເພີ່ມ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
