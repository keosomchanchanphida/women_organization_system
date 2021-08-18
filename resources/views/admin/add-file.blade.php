@extends(auth()->user() ? 'layouts.admin-app':'layouts.app')
@section('title', 'ອັບໂຫຼດໄຟລ໌')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">ອັບໂຫຼດໄຟລ໌</div>

                <div class="card-body">
                    <form action="{{ route('store-file') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ຊື່:</label>
                            <div class="col-md-6">
                                <input name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name' ?? '') }}"/>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">ໄຟລ໌:</label>
                            <div class="col-md-6">
                                <label for="file" class="btn btn-primary">ເລືອກໄຟລ໌</label>
                                <input type="file" name="file" id="file" class="form-control d-none @error('file') is-invalid @enderror" onchange="showFileName('file', 'file_name')"/>
                                <div id="file_name"></div>
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    ອັບໂຫຼດ
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
