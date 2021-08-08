@extends(auth()->user() ? 'layouts.admin-app':'layouts.app')
@section('title', 'ໜ້າຫຼັກ')

@section('banner')
    <br><br><br>
    <br>
    <br><br><br>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-12">
                <div class="card-body">
                    <div class="row justify-content-center">
                        @if (count($activities) > 0)
                        @foreach($activities as $activity)
                            <div class="col-sm-6 col-md-3 p-1">
                                <a href="#" class="text-decoration-none text-dark">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="w-100 bg-dark" style="height: 70px;"></div>
                                            <div class="text-center">
                                                {{ $activity->title }}
                                            </div>
                                            <hr class="my-1">
                                            <div class="limit-lines">
                                                {{ $activity->content }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        @else
                        <h3 class="text-center my-3">
                            ຂະນະນີ້ຍັງບໍ່ມີການເຄື່ອນໄຫວໃດໆໃນລະບົບ
                        </h3>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
