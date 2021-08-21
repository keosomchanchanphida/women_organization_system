<template>
    <div>
        <div class="w-100">
            <div class="row form-group mt-2 mx-0">
                <label for="searchbar" class="col-md-3 col-form-label text-md-right">ຄົ້ນຫາ:</label>
                <div class="col-md-6">
                    <input id="searchbar" v-model="keyword" @keydown.enter="search()" type="text" class="form-control">
                </div>
                <button @click="search()" class="btn btn-primary mt-2 ml-3 m-md-0">ຄົ້ນຫາ</button>
                <button v-if="isadmin" data-toggle="modal" data-target="#export-pdf-modal" class="btn btn-primary mt-2 ml-2 mt-md-0">ສ້າງ PDF</button>
            </div>
            <div class="row form-group m-0 mb-2">
                <div class="col-6 col-md-4 d-flex">
                    <label for="major_filter" class="col-form-label mr-1">ພາກວິຊາ:</label>
                    <select v-model="selectedMajor" name="major_filter" id="major_filter" class="form-control">
                        <option v-for="major in majors" :key="major" :value="major">{{ major }}</option>
                    </select>
                </div>
                <div class="col-6 col-md-4 d-flex">
                    <label for="state_position_filter" class="col-form-label mr-1">ຕໍາແໜ່ງທາງລັດ:</label>
                    <select v-model="selectedStatePosition" name="state_position_filter" id="state_position_filter" class="form-control">
                        <option v-for="position in statePositions" :key="position" :value="position">{{ position }}</option>
                    </select>
                </div>
                <div class="col-6 col-md-4 mt-2 mt-md-0 d-flex">
                    <label for="education_filter" class="col-form-label mr-1">ລະດັບການສຶກສາ:</label>
                    <select v-model="selectedEducation" name="education_filter" id="education_filter" class="form-control">
                        <option v-for="education in educations" :key="education" :value="education">{{ education }}</option>
                    </select>
                </div>
            </div>
            <div class="w-100 overflow-scroll">
                <div v-if="loading" class="text-center text-success">
                    <div class="spinner-border"><span class="sr-only"></span></div>
                </div>
                <div v-else>
                    <table class="table table-bordered">
                        <tr>
                            <th v-for="field in fields" :key="field" class="text-center">{{ field }}</th>
                        </tr>
                        <tr v-for="(member, index) in members" :key="member.id" @click="editMember(member.id)"  class="cursor-pointer">
                            <td>{{ index+1 }}</td>
                            <td>{{ member.name }}</td>
                            <td>{{ member.lastname }}</td>
                            <td>{{ member.dob }}</td>
                            <td>{{ member.djwomen }}</td>
                            <td>{{ member.djyouth }}</td>
                            <td>{{ member.djtrade }}</td>
                            <td>{{ member.djpolitical }}</td>
                            <td>{{ member.pob }}</td>
                            <td>{{ member.pliving }}</td>
                            <td>{{ member.tribe }}</td>
                            <td>{{ member.religious }}</td>
                            <td>{{ member.major }}</td>
                            <td>{{ member.education }}</td>
                            <td>{{ member.career }}</td>
                            <td>{{ member.statep}}</td>
                            <td>{{ member.politicalp}}</td>
                            <td>{{ member.graduatedp }}</td>
                            <td>{{ member.status }}</td>
                            <td>{{ member.phone }}</td>
                            <td>{{ member.duty }}</td>
                        </tr>
                    </table>
                </div>
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
                fields: ['ລໍາດັບ', 'ຊື່', 'ນາມສະກຸນ', 'ວັນເດືອນປີ ເກີດ', 'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກ', 'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກຊາວໜຸ່ມ', 'ວັນເດືອນປີ ເຂົ້າເປັນສະມາຊິກກໍາມະບານ', 'ວັນເດືອນປີ ເຂົ້າອົງການຈັດຕັ້ງພັກ', 'ບ້ານເກີດ', 'ບ້ານຢູ່', 'ຊົນເຜົ່າ', 'ສາສະໜາ', 'ພາກວິຊາ', 'ລະດັບການສຶກສາ', 'ອາຊີບ', 'ຕໍາແໜ່ງທາງລັດ', 'ຕໍາແໜ່ງທາງພັກ', 'ຈົບຈາກ', 'ສະຖານະ', 'ເບີໂທ', 'ໜ້າທີ່'],
                allMembers: null,
                keyword: '',
                selectedMajor: '',
                selectedStatePosition: '',
                selectedEducation: '',
                loading: true
            }
        },
        computed:{
            majors: function(){
                let majors = []
                if(this.allMembers !== null)
                    this.allMembers.forEach( member => majors.push(member.major) )
                let uniqueMajors = majors.filter((value, index, self) => self.indexOf(value) === index)
                uniqueMajors.unshift('ທັງໝົດ')
                this.selectedMajor = uniqueMajors[0]
                return uniqueMajors
            },
            statePositions: function(){
                let positions = []
                if(this.allMembers !== null)
                    this.allMembers.forEach( member => positions.push(member.statep) )
                let uniquePositions = positions.filter((value, index, self) => self.indexOf(value) === index)
                uniquePositions.unshift('ທັງໝົດ')
                this.selectedStatePosition = uniquePositions[0]
                return uniquePositions
            },
            educations: function(){
                let educations = []
                if(this.allMembers !== null)
                    this.allMembers.forEach( member => educations.push(member.education) )
                let uniqueEducations = educations.filter((value, index, self) => self.indexOf(value) === index)
                uniqueEducations.unshift('ທັງໝົດ')
                this.selectedEducation = uniqueEducations[0]
                return uniqueEducations
            },
            members: function(){
                let members = this.allMembers
                if(this.selectedMajor !== 'ທັງໝົດ')
                    members = members.filter(member => member.major === this.selectedMajor)
                if(this.selectedStatePosition !== 'ທັງໝົດ')
                    members = members.filter(member => member.statep === this.selectedStatePosition)
                if(this.selectedEducation !== 'ທັງໝົດ')
                    members = members.filter(member => member.education === this.selectedEducation )

                return members
            }
        },
        methods:{
            search: function(){
                this.loading = true
                axios.get('/api/members?search='+this.keyword)
                    .then( res => {
                        if(typeof(res.data) === 'object')
                            this.allMembers = Object.entries(res.data).map(i => i[1])
                        else if(typeof(res.data) === 'array')
                            this.allMembers = res.data
                        else this.allMembers = JSON.parse(JSON.stringify(res.data))
                        this.loading = false
                    })
            },
            editMember: function(id){
                window.open(`/edit-member/${id}`, '_self')
            }
        },
        mounted(){
            axios.get('/api/all-members')
                .then( res => {
                    if(typeof(res.data) === 'object')
                        this.allMembers = Object.entries(res.data).map(i => i[1])
                    else if(typeof(res.data) === 'array')
                        this.allMembers = res.data
                    else this.allMembers = JSON.parse(JSON.stringify(res.data))
                    this.loading = false
                })
        }
    }
</script>
