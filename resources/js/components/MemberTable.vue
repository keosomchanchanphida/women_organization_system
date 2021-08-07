<template>
    <div>
        <h3 v-if="typeof(allMembers) === null" class="text-center w-100 mt-3 mb-3">
            ກໍາລັງໂຫຼດ...
        </h3>
        <div v-else class="w-100">
            <div class="row form-group mt-2 mx-0">
                <label for="searchbar" class="col-md-3 col-form-label text-md-right">ຄົ້ນຫາ:</label>
                <div class="col-md-6">
                    <input id="searchbar" v-model="keyword" @keydown.enter="search()" type="text" class="form-control">
                </div>
                <button @click="search()" class="btn btn-primary mt-2 ml-3 m-md-0">ຄົ້ນຫາ</button>
                <button v-if="isadmin" data-toggle="modal" data-target="#export-pdf-modal" class="btn btn-primary mt-2 ml-2 mt-md-0">ສ້າງ PDF</button>
            </div>
            <div class="row form-group m-0 mb-2">
                <div class="col-4 d-flex">
                    <label for="major_filter" class="col-form-label mr-1">ພາກວິຊາ:</label>
                    <select v-model="selectedMajor" name="major_filter" id="major_filter" class="form-control">
                        <option v-for="major in majors" :key="major" :value="major">{{ major }}</option>
                    </select>
                </div>
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
                        <td>{{ member.placeOfBirth }}</td>
                        <td>{{ member.livingPlace }}</td>
                        <td>{{ member.tribe.name }}</td>
                        <td>{{ member.religious.name }}</td>
                        <td>{{ member.major.name }}</td>
                        <td>{{ member.education.level }}</td>
                        <td>{{ member.career.career }}</td>
                        <td>{{ member.statePosition}}</td>
                        <td>{{ member.politicalPosition}}</td>
                        <td>{{ member.graduatedPlace }}</td>
                        <td>{{ member.status.status }}</td>
                        <td>{{ member.phone_number }}</td>
                        <td>{{ member.duty.duty }}</td>
                    </tr>
                </table>
            </div>
            <export-pdf v-if="isadmin" :members="members" />
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            isadmin: Boolean
        },
        data(){
            return {
                fields: ['ລະຫັດ', 'ຊື່', 'ນາມສະກຸນ', 'ວັນເດືອນປີ ເກີດ', 'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກ', 'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກຊາວໜຸ່ມ', 'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກກໍາມະບານ', 'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກພັກ', 'ບ້ານເກີດ', 'ບ້ານຢູ່', 'ຊົນເຜົ່າ', 'ສາສະໜາ', 'ພາກວິຊາ', 'ລະດັບການສຶກສາ', 'ອາຊີບ', 'ຕໍາແໜ່ງທາງລັດ', 'ຕໍາແໜ່ງທາງພັກ', 'ຈົບຈາກ', 'ສະຖານະ', 'ເບີໂທ', 'ໜ້າທີ່'],
                allMembers: null,
                keyword: '',
                selectedMajor: ''
            }
        },
        computed:{
            majors: function(){
                let majors = []
                if(this.allMembers !== null)
                    this.allMembers.forEach( member => majors.push(member.major.name) )
                let uniqueMajors = majors.filter((value, index, self) => self.indexOf(value) === index)
                uniqueMajors.unshift('ທັງໝົດ')
                this.selectedMajor = uniqueMajors[0]
                return uniqueMajors
            },
            members: function(){
                let members = this.allMembers
                if(this.selectedMajor !== 'ທັງໝົດ')
                    members = members.filter(member => member.major.name === this.selectedMajor)
                return members
            }
        },
        methods:{
            search: function(){
                axios.get('/api/members?search='+this.keyword)
                    .then( res => {
                        this.allMembers = res.data
                    })
            },
            editMember: function(id){
                window.open(`/edit-member/${id}`, '_self')
            }
        },
        mounted(){
            axios.get('/api/all-members')
                .then( res => {
                    this.allMembers = res.data
                })
        }
    }
</script>
