@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (isset($alert))
                <div class="alert {{ $alertClass }}">
                    {{ $alert }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">ເພີ່ມກິດຈະກໍາ</div>

                <div class="card-body">
                    <form action="/store-member" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ຫົວຂໍ້:</label>
                            <div class="col-md-6">
                                <input name="name" id="name" class="form-control @error('name') is-invalid @enderror"/>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    ເພີ່ມກິດຈະກໍາ
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
