@extends(auth()->user() ? 'layouts.admin-app':'layouts.app')
@section('title',)
    ໄຟລ໌ທັງໝົດ
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-12">
            <div class="card-body">
                <div class="row justify-content-center">
                    @if (count($files) > 0)
                        @foreach($files as $file)
                            <div class="col-sm-6 col-md-3 p-1">
                                <a href="{{ $file->file_path }}" class="text-decoration-none text-dark">
                                    @auth
                                        <div class="position-absolute" style="right: 0; z-index: 1;">
                                            <a href="{{ route('edit-file', ['file' => $file->id]) }}" class="btn btn-primary">ແກ້ໄຂ</a>
                                        </div>
                                    @endauth
                                    <div class="card border-0">
                                        <div class="card-body">
                                            {{ $file->name }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        @else
                        <h3 class="text-center my-3">
                            ຂະນະນີ້ຍັງບໍ່ມີໄຟລ໌ໃນລະບົບ
                        </h3>
                        @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
