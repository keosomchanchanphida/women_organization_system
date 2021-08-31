@extends(auth()->user() ? 'layouts.admin-app':'layouts.app')
@section('title', 'ໂຄງຮ່າງການຈັດຕັ້ງ')

@section('banner')
    <img src="/storage/img/profiles1.jpg" class="w-100" alt="">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card p-0 col-md-12">
                <div class="card-header bg-success text-white text-center" style="font-size: 1.3rem;">
                    ໂຄງຮ່າງການຈັດຕັ້ງ
                </div>
                <div class="card-body">
                    <img src="/storage/img/positionstructure.jpg" alt="positionstructure" class="w-100">
                </div>
            </div>
        </div>
    </div>
@endsection
