@extends('layouts.app')
@section('title',)
    {{ $activity->title ?? 'ການເຄື່ອນໄຫວ' }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-12">
            <div class="card-body">
                <div class="row">
                    <h3 class="text-center w-100">{{ $activity->title }}</h3>
                </div>
                <div>
                    <p>{{ $activity->content }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
