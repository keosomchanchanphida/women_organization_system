<template>
    <div class="w-100">
        <div class="row w-100 m-0">
            <label for="province_id" class="col-md-4 col-form-label text-md-right">ແຂວງ:</label>
            <div class="col-md-6">
                <select v-model="province_id" name="province_id" id="province_id" class="form-control">
                    <option v-for="province in provinces" :key="province.id" :value="province.id">{{ province.name  }}</option>
                </select>
                <span v-if="error" class="invalid-feedback" role="alert">
                    <strong>{{ error  }}</strong>
                </span>
            </div>
            <div class="col-md-2 mt-1 mt-md-0 p-md-0"><a href="/add-province" class="btn btn-primary">ເພີ່ມ</a></div>
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
                provinces: [],
                province_id: ''
            }
        },
        mounted(){
            axios.get('/api/provinces')
                .then( res => {
                    this.provinces = res.data
                    this.province_id = this.provinces[0].id
                })

        }
    }
</script>
