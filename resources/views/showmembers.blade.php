@extends(auth()->user() ? 'layouts.admin-app':'layouts.app')
@section('title', 'ສະມາຊິກ')
@section('content')
<div class="pt-md-2 pl-md-2 pr-md-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-0">
                    <member-table @auth isadmin @endauth />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
