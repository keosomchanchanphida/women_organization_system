@extends(auth()->user() ? 'layouts.admin-app':'layouts.app')
@section('title',)
    ການເຄື່ອນໄຫວ{{ $spacific ?? '' }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-12">
            <div class="card-body">
                <div class="row justify-content-center">
                    @foreach ($activities as $activity)
                        <div class="col-12 col-md-6 p-1">
                            <a href="{{ route('show-activity', ['activity' => $activity->id]) }}" class="text-decoration-none text-dark">
                                <div class="card border">
                                    <div class="card-body p-0">
                                        <div class="px-2 my-1 px-md-3 my-md-2">{{ $activity->title }}</div>
                                        <hr class="m-0">
                                        <div class="px-2 my-1 px-md-3 my-md-2 limit-lines">{{ $activity->content }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
