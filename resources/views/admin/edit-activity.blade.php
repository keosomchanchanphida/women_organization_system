@extends(auth()->user() ? 'layouts.admin-app':'layouts.app')
@section('title')
    ແກ້ໄຂການເຄື່ອນໄຫວ{{ $type ?? '' }}
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">ແກ້ໄຂການເຄື່ອນໄຫວ{{ $type ?? '' }}</div>

                <div class="card-body">
                    <form action="{{ route('update-activity', ['activity' => $activity->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">ປະເພດ:</label>
                            <div class="col-md-6">
                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="inside" @if($activity->type === 'inside') selected @endif>ການເຄື່ອນໄຫວພາຍໃນ</option>
                                    <option value="outside" @if($activity->type === 'outside') selected @endif>ການເຄື່ອນໄຫວພາຍນອກ</option>
                                </select>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">ຊື່:</label>
                            <div class="col-md-6">
                                <input name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $activity->title }}"/>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">ເນື້ອໃນຫຼັກ:</label>
                            <div class="col-md-6">
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('activity') ?? $activity->content }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="major_id" class="col-md-4 col-form-label text-md-right">ພາກວິຊາ:</label>
                            <div class="col-md-6">
                                <select name="major_id" id="major_id" class="form-control @error('major_id') is-invalid @enderror">
                                    @foreach (App\Models\Major::orderBy('name')->get() as $major)
                                        <option value="{{ $major->id }}" @if($activity->major_id === $major->id) selected @endif>{{ $major->name }}</option>
                                    @endforeach
                                </select>
                                @error('major_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-100">
                            <input-activity-image images='{{ json_encode($activity->images) }}'/>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    ແກ້ໄຂການເຄື່ອນໄຫວ
                                </button>
                                <button class="btn btn-danger ml-2" onclick="submitDeleteForm(event, 'ທ່ານແນ່ໃຈບໍ່ວ່າຕ້ອງການລົບກິດຈະກໍານີ້?', 'delete-form')">ລົບກິດຈະກໍາ</button>
                            </div>
                        </div>
                    </form>
                    <form id="delete-form" action="{{ route('delete-activity', ['activity' => $activity]) }}}}" class="d-none" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
