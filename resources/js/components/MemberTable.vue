<template>
    <div>
        <h3 v-if="typeof(members) === null" class="text-center w-100 mt-3 mb-3">
            ກໍາລັງໂຫຼດ...
        </h3>
        <div v-else class="w-100">
            <div class="row form-group mt-2">
                <label for="searchbar" class="col-md-4 col-form-label text-md-right">ຄົ້ນຫາ:</label>
                <div class="col-md-6">
                    <input v-model="keyword" @keydown.enter="search()" type="text" class="form-control">
                </div>
                <button @click="search()" class="btn btn-primary mt-2 ml-3 m-md-0">ຄົ້ນຫາ</button>
            </div>
            <div class="w-100 overflow-scroll">
                <table class="table table-bordered">
                    <tr>
                        <th v-for="field in fields" :key="field" class="text-center">{{ field }}</th>
                    </tr>
                    <tr v-for="member in members" :key="member.id" @click="editMember(member.id)"  class="cursor-pointer">
                        <td>{{ member.id }}</td>
                        <td>{{ member.name }}</td>
                        <td>{{ member.lastname }}</td>
                        <td>{{ member.date_of_birth }}</td>
                        <td>{{ member.date_joined_women_union }}</td>
                        <td>{{ member.date_joined_youth_union }}</td>
                        <td>{{ member.date_joined_trade_union }}</td>
                        <td>{{ member.date_joined_political_party }}</td>
                        <td>{{ member.placeOfBirth.name }}</td>
                        <td>{{ member.livingPlace.name }}</td>
                        <td>{{ member.tribe.name }}</td>
                        <td>{{ member.religious.name }}</td>
                        <td>{{ member.major.name }}</td>
                        <td>{{ member.education.level }}</td>
                        <td>{{ member.career.career }}</td>
                        <td>{{ member.statePosition? member.statePosition.position:'' }}</td>
                        <td>{{ member.politicalPosition? member.politicalPosition.position:'' }}</td>
                        <td>{{ member.graduatedPlace.name }}</td>
                        <td>{{ member.status.status }}</td>
                        <td>{{ member.phone_number }}</td>
                        <td>{{ member.duty.duty }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: {

        },
        data(){
            return {
                fields: ['ລະຫັດ', 'ຊື່', 'ນາມສະກຸນ', 'ວັນເດືອນປີ ເກີດ', 'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກ', 'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກຊາວໜຸ່ມ', 'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກກໍາມະບານ', 'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກພັກ', 'ບ້ານເກີດ', 'ບ້ານຢູ່', 'ຊົນເຜົ່າ', 'ສາສະໜາ', 'ພາກວິຊາ', 'ລະດັບການສຶກສາ', 'ອາຊີບ', 'ຕໍາແໜ່ງທາງລັດ', 'ຕໍາແໜ່ງທາງພັກ', 'ຈົບຈາກ', 'ສະຖານະ', 'ເບີໂທ', 'ໜ້າທີ່'],
                members: null,
                keyword: ''
            }
        },
        computed:{

        },
        methods:{
            search: function(){
                axios.get('/api/members?search='+this.keyword)
                    .then( res => {
                        this.members = res.data
                    })
            },
            editMember: function(id){
                window.open(`/edit-member/${id}`, '_self')
            }
        },
        mounted(){
            axios.get('/api/all-members')
                .then( res => {
                    this.members = res.data
                })
        }
    }
</script>
