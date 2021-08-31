@extends(auth()->user() ? 'layouts.admin-app':'layouts.app')
@section('title',)
    ຄົ້ນຫາ : {{ $search ?? '' }}
@endsection
@section('banner')
    <img src="/storage/img/profiles1.jpg" class="w-100" alt="">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card p-0 col-md-12">
            <div class="card-header bg-success text-white">
                ຄົ້ນຫາການເຄື່ອນໄຫວ: {{ $search ?? '' }}
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    @if (count($activities) > 0)
                        @foreach($activities as $activity)
                            <div class="col-sm-6 @auth col-md-3 @else col-md-4 @endauth p-1">
                                <a href="{{ route('show-activity', ['activity' => $activity->id]) }}" class="text-decoration-none text-dark">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="w-100" style="">
                                                @if (count($activity->images) > 0)
                                                    <img class="w-100" src="{{ $activity->images->get(0)->image_path }}" alt="">
                                                @else
                                                    <p class="text-center">ບໍ່ມີຮູບພາບປະກອບ</p>
                                                @endif
                                            </div>
                                            <div class="text-center">
                                                {{ $activity->title }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        @else
                        <h3 class="text-center my-3">
                            ບໍ່ມີການເຄື່ອນໄຫວທີ່ຕົງກັບການຄົ້ນຫາ
                        </h3>
                        @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
