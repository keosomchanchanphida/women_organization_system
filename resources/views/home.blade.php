@extends(auth()->user() ? 'layouts.admin-app':'layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ເພີ່ມສະມາຊິກ') }}</div>

                <div class="card-body">
                    <div class="form-group row">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
