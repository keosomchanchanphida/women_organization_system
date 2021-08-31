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
                    ຕິດຕໍ່ສອບຖາມ
                </div>
                <div class="card-body">
                    <p style="text-indent: 1.5rem;">
                        ຕິດຕໍ່ພົວພັນຫົວຫນ້າໜ່ວຍແມ່ຍິງ ເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານ ໄດ້ຕາມທີ່ຢູ່ດັ່ງລຸ່ມນີ້:
                    </p>
                    <div class="ml-md-5 mb-2">
                        <a class="text-dark" href="https://www.facebook.com/latdavanh.naonad"><img src="/storage/img/facebook.svg" alt="facebook" style="width: 32px;"> Facebook: Latdavanh Naonady</a>
                    </div>
                    <div class="ml-md-5 mb-2">
                        <a><img src="/storage/img/whatsapp.svg" alt="whatsapp" style="width: 32px;"> Whatsapp: 020 22 306 665</a>
                    </div>
                    <div class="ml-md-5 mb-2">
                        <a><img src="/storage/img/phone-call.svg" alt="phone-call" style="width: 32px;"> ໂທ: 020 22 306 665</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
