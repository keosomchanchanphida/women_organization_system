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
                <select v-model="district_id" name="district_id" id="district_id" class="form-control">
                    <option v-for="district in districts" :key="district.id" :value="district.id">{{ district.name  }}</option>
                </select>
                <span v-if="error" class="invalid-feedback" role="alert">
                    <strong>{{ error  }}</strong>
                </span>
            </div>
            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="/add-district" class="btn btn-primary">ເພີ່ມ</a></div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'error'
        ],
        data(){
            return {
                districts: [],
                provinces: [],
                province_id: '',
                district_id: ''
            }
        },
        methods:{
            getDistricts: function(province_id){
                axios.get('/api/districts/'+province_id)
                    .then( res => {
                        this.districts = res.data
                        if(this.districts.lenght === 0){
                            this.district_id = ''
                        }else{
                            this.district_id = this.districts[0].id
                        }
                    })
                    .catch( () => {
                        this.districts = []
                        this.district_id = ''
                    })
            }
        },
        mounted(){
            axios.get('/api/provinces')
                .then( res => {
                    this.provinces = res.data
                    this.province_id = this.provinces[0].id
                    this.getDistricts(this.province_id)
                })

        }
    }
</script>
