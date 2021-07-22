<template>
    <div class="w-100">
        <div class="row w-100 m-0">
            <label for="province_id" class="col-md-4 col-form-label text-md-right">ແຂວງ:</label>
            <div class="col-md-6">
                <select v-model="province_id" @change="getDistricts(province_id)" name="province_id" id="province_id" class="form-control">
                    <option v-for="province in provinces" :key="province.id" :value="province.id">{{ province.name  }}</option>
                </select>
            </div>
            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="/add-province" class="btn btn-primary">ເພີ່ມ</a></div>
        </div>
        <div class="row w-100 m-0 mt-1 mb-1">
            <label for="district_id" class="col-md-4 col-form-label text-md-right">ເມືອງ:</label>
            <div class="col-md-6">
                <select v-model="district_id" @change="getVillages(district_id)" name="district_id" id="district_id" class="form-control">
                    <option v-for="district in districts" :key="district.id" :value="district.id">{{ district.name  }}</option>
                </select>
            </div>
            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="/add-district" class="btn btn-primary">ເພີ່ມ</a></div>
        </div>
        <div class="row w-100 m-0">
            <label :for="name" class="col-md-4 col-form-label text-md-right">{{ label }}:</label>
            <div class="col-md-6">
                <select v-model="village_id" :name="name" :id="name" class="form-control" :class="{error: 'is-invalid'}">
                    <option v-for="village in villages" :key="village.id" :value="village.id">{{ village.name  }}</option>
                </select>
                <span v-if="error" class="invalid-feedback" role="alert">
                    <strong>{{ error  }}</strong>
                </span>
            </div>
            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="/add-village" class="btn btn-primary">ເພີ່ມ</a></div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'label',
            'name',
            'error',
            'selectedVillageId'
        ],
        data(){
            return {
                villages: [],
                districts: [],
                provinces: [],
                province_id: '',
                district_id: '',
                village_id: ''
            }
        },
        methods:{
            getDistricts: function(province_id, district_id = null){
                axios.get('/api/districts/'+province_id)
                    .then( res => {
                        this.districts = res.data
                        if(this.districts.lenght === 0){
                            this.district_id = ''
                            this.resetVillage()
                        }else{
                            if(district_id !== null){
                                this.district_id = district_id
                                this.getVillages(this.district_id, Number(this.selectedVillageId))
                            }else{
                                this.district_id = this.districts[0].id
                                this.getVillages(this.district_id)
                            }
                        }
                    })
                    .catch( () => {
                        this.districts = []
                        this.district_id = ''
                        this.resetVillage()
                    })
            },
            getVillages: function(district_id, village_id = null){
                axios.get('/api/villages/'+district_id)
                    .then( res => {
                        this.villages = res.data
                        if(this.villages.lenght === 0)
                            this.village_id = ''
                        else{
                            if(village_id !== null){
                                this.village_id = village_id
                            }else
                                this.village_id = this.villages[0].id
                        }
                    })
                    .catch( () => {
                        this.resetVillage()
                    })
            },
            setSelectedVillage: function(village_id){
                var district;
                var province;
                axios.get('/api/district/'+village_id)
                    .then( res => {
                        district = res.data
                        axios.get('/api/province/'+district.id)
                            .then( resp => {
                                province = resp.data
                                this.getProvinces(province.id, district.id)
                            })
                    })
            },
            resetVillage: function(){
                this.villages = []
                this.village_id = ''
            },
            convertToArray(data){
                var array = []
                for(const i in data){
                    array.push(data[i])
                }
                return array
            },
            getProvinces: function(province_id = null, district_id = null){
                axios.get('/api/provinces')
                    .then( res => {
                        this.provinces = res.data
                        if(province_id !== null){
                            if(typeof(this.provinces == 'object'))
                                this.provinces = this.convertToArray(this.provinces)
                            this.province_id = this.provinces.filter( i => province_id === i.id)[0].id
                            if(district_id !== null)
                                this.getDistricts(province_id, district_id)
                            else
                                this.getDistricts(this.province_id)
                        }else{
                            this.province_id = this.provinces[0].id
                            this.getDistricts(this.province_id)
                        }
                    })
            }
        },
        mounted(){
            if(this.selectedVillageId)
                this.setSelectedVillage(this.selectedVillageId)
            else
                this.getProvinces()
        }
    }
</script>
