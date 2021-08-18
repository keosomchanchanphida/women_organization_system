@extends(auth()->user() ? 'layouts.admin-app':'layouts.app')
@section('title',)
    {{ $activity->title ?? 'ການເຄື່ອນໄຫວ' }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-12">
            <div class="card-body">
                <div class="row position-relative">
                    <h3 class="text-center w-100 font-32px">{{ $activity->title }}</h3>
                    @auth
                        <div class="position-absolute" style="right: 0;">
                            <a href="{{ route('edit-activity', ['activity' => $activity->id]) }}" class="btn btn-primary">ແກ້ໄຂ</a>
                        </div>
                    @endauth
                </div>
                <div>
                    <p class="font-24px indent">{{ $activity->content }}</p>
                    @foreach ($activity->images as $image)
                        <div class="w-100">
                            <div class="w-100 d-flex justify-content-center"><img src="{{ $image->image_path }}" alt="" class="w-100 w-md-50"></div>
                            <p class="font-24px indent">{{ $image->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
