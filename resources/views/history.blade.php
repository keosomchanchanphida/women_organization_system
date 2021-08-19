@extends(auth()->user() ? 'layouts.admin-app':'layouts.app')
@section('title', 'ຄວາມເປັນມາ')

@section('banner')
    <img src="/storage/img/profiles1.jpg" class="w-100" alt="">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-12">
                <div class="card-body">
                    <h4 class="text-center">
                        ປະຫວັດຄວາມເປັນມາ
                    </h4>
                    <p style="text-indent: 1.5rem;">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia excepturi velit, ex doloribus, iste laborum sunt pariatur quidem iure deserunt porro nemo sint, soluta nulla! Iusto nesciunt quibusdam eum tempore!
                    </p>
                    <p style="text-indent: 1.5rem;">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem voluptatum distinctio voluptatibus aspernatur laudantium tenetur quod ea quia. Quo eligendi perspiciatis consequuntur facilis excepturi, reiciendis id, optio velit repellat ex consequatur temporibus. Debitis, consequuntur labore! Quas enim fugit velit, reiciendis aliquam maxime quibusdam officiis, autem, perspiciatis dolorum quae quisquam amet.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
