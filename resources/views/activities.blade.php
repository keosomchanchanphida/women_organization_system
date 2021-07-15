@extends('layouts.app')
@section('title',)
    ການເຄື່ອນໄຫວ{{ $spacific ?? '' }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("ການເຄື່ອນໄຫວ") }}{{ $spacific ?? '' }}</div>

                <div class="card-body">
                    <div class="form-group row">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
