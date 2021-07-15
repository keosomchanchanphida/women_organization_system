@extends('layouts.app')
@section('title')
    {{ $title ?? '' }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title ?? 'ເພີ່ມຂໍ້ມູນ' }}</div>
                <div class="card-body">
                    <form action="{{ $action }}" method="POST">
                        @csrf
                        @foreach ($fields as $label => $name)
                        <div class="form-group row">
                            <label for="{{ $name }}" class="col-md-4 col-form-label text-md-right">
                                {{ $label }}:
                            </label>
                            <div class="col-md-6 row m-0 align-items-center">
                                <input type="text" name="{{ $name }}" id="{{ $name }}" class="form-control col-12 @error($name) is-invalid @enderror"/>
                                @error($name)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endforeach
                        {{ $additional ?? '' }}
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ $submit ?? 'ເພີ່ມ' }}
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
