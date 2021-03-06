@extends(auth()->user() ? 'layouts.admin-app':'layouts.app')
@section('title', 'ຄວາມເປັນມາ')

@section('banner')
    <img src="/storage/img/profiles1.jpg" class="w-100" alt="">
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card p-0 col-md-12">
                <div class="card-header bg-success text-white text-center" style="font-size: 1.3rem;">
                    ປະຫວັດຄວາມເປັນມາ
                </div>
                <div class="card-body">
                    <p style="text-indent: 1.5rem;" class="text-break">
                        ສະຫະພັນແມ່ຍິງ ສ້າງຕັ້ງຂື້ນໃນວັນທີ 20 ກໍລະກົດ ປີ 1955. ສະຫະພັນແມ່ຍິງແມ່ນອົງການຈັດຕັ້ງສະເພາະເພດຍິງ ເຊິ່ງເປັນຕົວແທນໃນການປົກປ້ອງສິດທິຜົນປະໂຫຍດຂອງຄວາມເປັນແມ່ ແລະ ເດັກນ້ອຍ ຄະນະສະຫະພັນແມ່ຍິງລາວ ມີພາລະໜ້າທີ່ໃນການເຕົ້າໂຮມຄວາມສາມັກຄີຂອງແມ່ຍິງລາວບັນດາເຜົ່າ, ສຶກສາອົບຮົມຍົກລະດັບຄວາມຮູ້ຄວາມສາມາດ ຢ່າງຮອບດ້ານໃຫ້ແກ່ປະເທດຊາດ, ເຊີດຊູບົດບາດຂອງແມ່ຍິງລາວໃນທົ່ວປະເທດໃຫ້ສູງຂຶ້ນຢູ່ໃນສັງຄົມລາວ ແລະ ເວທີສາກົນ.
                    </p>
                    <p style="text-indent: 1.5rem;" class="text-break">
                        ໜ່ວຍແມ່ຍິງຄະນະເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານແມ່ນຮາກຖານໜຶ່ງທີ່ໄດ້ດຳເນີນການເຄື່ອນໄຫວພາຍໃຕ້ການຊີ້ນຳ-ນຳພາຂອງຄະນະຮາກຖານຂອງສະຫະພັນແມ່ຍິງມະຫາວິທະຍາໄລສະຫວັນນະເຂດ, ຄະນະສະຫະພັນແມ່ຍິງ ແຂວງ. ມີບົດບາດໃນການຈັດການຈັດຕັ້ງປະຕິບັດແນວທາງນະໂຍບາຍຂອງພັກລັດ, ລະບຽບກົດໝາຍຂອງພັກລັດນອກຈາກນີ້ຍັງໄດ້ປະກອບສ່ວນເຂົ້າການປົກປັກຮັກສາ ແລະ ສ້າງສາປະເທດ. ໜ່ວຍແມ່ຍິງໃນຄະນະເຕັກໂນໂລຊີຂໍ້ມູນຂ່າວສານມີມາຊິກໜ່ວຍແມ່ຍິງທັງໝົດ 216 ຄົນ. ສະມາຊິກທີ່ເປັນອາຈານ ມີ 12ຄົນ ແລະ ສະມາຊິກທີ່ເປັນນັກສຶກສາ ມີ204 ຄົນ.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
