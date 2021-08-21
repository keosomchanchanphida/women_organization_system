@extends(auth()->user() ? 'layouts.admin-app':'layouts.app')
@section('title',)
    ຮ່າງຂໍ້ມູນດີເດັ່ນ3ດີ
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card p-0 col-md-12">
            <div class="card-header bg-success text-white">
                ຮ່າງຂໍ້ມູນດີເດັ່ນ3ດີ
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    @if (count($files) > 0)
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>ລໍາດັບ</th>
                                <th>ໄຟລ໌</th>
                                <th>ຫົວຂໍ້ໄຟລ໌</th>
                                <th>ເພີ່ມລົງເມື່ອ</th>
                                <th>ຂະໜາດ</th>
                                @auth
                                <th>ຕົວເລືອກ</th>
                                @else
                                <th>ດາວໂຫຼດ</th>
                                @endauth
                            </tr>
                            @foreach($files as $index => $file)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td><img src="/storage/img/pdf.svg" alt="pdf" style="width: 40px;"></td>
                                    <td>{{ $file->name }}</td>
                                    <td>{{ $file->posted_at }}</td>
                                    <td>{{ $file->size }}</td>
                                    <td>
                                        <a href="{{ $file->file_path }}" class="btn btn-success"> ດາວໂຫຼດ </a>
                                        @auth()
                                        <a href="{{ route('edit-file', ['file' => $file->id]) }}" class="ml-1 btn btn-primary"> ແກ້ໄຂ </a>
                                        @endauth
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                        <h3 class="text-center my-3">
                            ຂະນະນີ້ຍັງບໍ່ມີຮ່າງຂໍ້ມູນດີເດັ່ນ3ດີໃນລະບົບ
                        </h3>
                        @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
