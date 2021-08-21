<template>
<div class="modal fade" id="export-pdf-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pl-1 pr-1 pl-md-2 pr-md-2">
            <div class="modal-header">
                <div class="modal-title">ສ້າງ PDF</div>
                <button class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">ຂໍ້ມູນທີ່ປິນ:</div>
                <div class="row">
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="index" id="id" value="1">
                        <label for="id" class="col-form-label">ລະຫັດ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="name" id="name" value="1">
                        <label for="name" class="col-form-label">ຊື່</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="lastname" id="lastname" value="1">
                        <label for="lastname" class="col-form-label">ນາມສະກຸນ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="date_of_birth" id="date_of_birth" value="1">
                        <label for="date_of_birth" class="col-form-label">ວັນເດືອນປີເກີດ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="date_joined_women_union" id="date_joined_women_union" value="1">
                        <label for="date_joined_women_union" class="col-form-label">ວດປ ເຂົ້າເພດຍິງ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="date_joined_youth_union" id="date_joined_youth_union" value="1">
                        <label for="date_joined_youth_union" class="col-form-label">ວດປ ເຂົ້າຊາວໜຸ່ມ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="date_joined_trade_union" id="date_joined_trade_union" value="1">
                        <label for="date_joined_trade_union" class="col-form-label">ວດປ ເຂົ້າກໍາມະບານ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="date_joined_political_party" id="date_joined_political_party" value="1">
                        <label for="date_joined_political_party" class="col-form-label">ວດປ ເຂົ້າອົງການຈັດຕັ້ງພັກ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="village_of_birth" id="village_of_birth" value="1">
                        <label for="village_of_birth" class="col-form-label">ບ້ານເກີດ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="living_village" id="living_village" value="1">
                        <label for="living_village" class="col-form-label">ບ້ານຢູ່</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="tribe" id="tribe" value="1">
                        <label for="tribe" class="col-form-label">ຊົນເຜົ່າ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="religious" id="religious" value="1">
                        <label for="religious" class="col-form-label">ສາສະໜາ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="major" id="major" value="1">
                        <label for="major" class="col-form-label">ພາກວິຊາ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="education" id="education" value="1">
                        <label for="education" class="col-form-label">ລະດັບການສຶກສາ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="career" id="career" value="1">
                        <label for="career" class="col-form-label">ອາຊີບ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="state_position" id="state_position" value="1">
                        <label for="state_position" class="col-form-label">ຕໍາແໜ່ງທາງລັດ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="political_position" id="political_position" value="1">
                        <label for="political_position" class="col-form-label">ຕໍາແໜ່ງທາງພັກ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="graduated_place" id="graduated_place" value="1">
                        <label for="graduated_place" class="col-form-label">ຈົບຈາກ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="status" id="status" value="1">
                        <label for="status" class="col-form-label">ສະຖານະ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="phone_number" id="phone_number" value="1">
                        <label for="phone_number" class="col-form-label">ເບີໂທ</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3">
                        <input type="checkbox" v-model="duty" id="duty" value="1">
                        <label for="duty" class="col-form-label">ໜ້າທີ່</label>
                    </div>
                </div>
                <div class="row">ລາຍຊື່ທີ່ປິນ:</div>
                <div class="row">
                    <table class="table table-bordered">
                        <tr>
                            <th @click="selectAll()" class="cursor-pointer">ເລືອກທັງໝົດ</th>
                            <th class="col-4">ຊື່</th>
                            <th class="col-4">ນາມສະກຸນ</th>
                        </tr>
                        <tr v-for="(member, index) in members" :key="member.id">
                            <label :for="'list'+index" class="d-block w-100 h-100 m-0 cursor-pointer"><td class="d-block w-100 h-100"><input :id="'list'+index" v-model="selected[index]" type="checkbox" value="1" class="mr-1 checkable-list">ເລືອກ</td></label>
                            <td>{{ member.name }}</td>
                            <td>{{ member.lastname }}</td>
                        </tr>
                    </table>
                </div>
                <div class="form-group row">
                    <button @click="exportpdf()" class="offset-md-4 btn btn-primary">ສ້າງ</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props:{
        members: Array|Object
    },
    data(){
        return{
            selected: [],
            index: true,
            name: true,
            lastname: true,
            date_of_birth: true,
            date_joined_women_union: true,
            date_joined_youth_union: true,
            date_joined_trade_union: true,
            date_joined_political_party: true,
            village_of_birth: true,
            living_village: true,
            tribe: true,
            religious: true,
            major: true,
            education: true,
            career: true,
            state_position: true,
            political_position: true,
            graduated_place: true,
            status: true,
            phone_number: true,
            duty: true,
        }
    },
    computed:{
        list: function(){
            let list = []
            this.selected.forEach((value, index) => {
                if(value && this.members[index]) list.push(this.members[index].id)
            })
            return list
        }
    },
    methods:{
        exportpdf: function(){
            if(this.list.length > 0)
                axios.post('/export', {
                    members: this.list,
                    index: this.index,
                    name: this.name,
                    lastname: this.lastname,
                    date_of_birth: this.date_of_birth,
                    date_joined_women_union: this.date_joined_women_union,
                    date_joined_youth_union: this.date_joined_youth_union,
                    date_joined_trade_union: this.date_joined_trade_union,
                    date_joined_political_party: this.date_joined_political_party,
                    village_of_birth: this.village_of_birth,
                    living_village: this.living_village,
                    tribe: this.tribe,
                    religious: this.religious,
                    major: this.major,
                    education: this.education,
                    career: this.career,
                    state_position: this.state_position,
                    political_position: this.political_position,
                    graduated_place: this.graduated_place,
                    status: this.status,
                    phone_number: this.phone_number,
                    duty: this.duty,
                }).then( res => {
                    window.open(res.data)
                })
        },
        selectAll: function(){
            let length = this.members.length
            let checkboxes = document.getElementsByClassName('checkable-list')
            let temp = []
            for(let i=0; i<length; i++){
                temp[i] = true
                checkboxes[i].checked = true
            }
            this.selected = temp
        }
    }
}
</script>
