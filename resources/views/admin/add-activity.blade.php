@extends('layouts.app')
@section('title')
    ເພີ່ມການເຄື່ອນໄຫວ{{ $spacific ?? '' }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">ເພີ່ມການເຄື່ອນໄຫວ{{ $spacific ?? '' }}</div>

                <div class="card-body">
                    <form action="{{ route('store-activity') }}" method="POST">
                        @csrf
                        <input name="spacific" type="hidden" value="{{  $spacific ?? ''  }}">
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">ຊື່:</label>
                            <div class="col-md-6">
                                <input name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title' ?? '') }}"/>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">ເນື້ອໃນຫຼັກ:</label>
                            <div class="col-md-6">
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="major_id" class="col-md-4 col-form-label text-md-right">ພາກວິຊາ:</label>
                            <div class="col-md-6">
                                <select name="major_id" id="major_id" class="form-control @error('major_id') is-invalid @enderror">
                                    @foreach (App\Models\Major::orderBy('name')->get() as $major)
                                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                                    @endforeach
                                </select>
                                @error('major_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    ເພີ່ມການເຄື່ອນໄຫວ
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
