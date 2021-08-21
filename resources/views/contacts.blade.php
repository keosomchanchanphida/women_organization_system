@extends(auth()->user() ? 'layouts.admin-app':'layouts.app')
@section('title', 'ຕິດຕໍ່ສອບຖາມ')

@section('banner')
    <img src="/storage/img/profiles1.jpg" class="w-100" alt="">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card p-0 col-md-12">
                <div class="card-header bg-success text-white text-center" style="font-size: 1.3rem;">
                    ກ່ຽວກັບເວັບ
                </div>
                <div class="card-body">
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia excepturi velit, ex doloribus, iste laborum sunt pariatur quidem iure deserunt porro nemo sint, soluta nulla! Iusto nesciunt quibusdam eum tempore!
                    </p>
                    <ul>
                        <li>Facebook: </li>
                        <li>Whatsapp: </li>
                        <li>ໂທ: </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
