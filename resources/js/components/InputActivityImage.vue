<template>
    <div class="w-100">
        <div v-for="(value, index) in list" :key="index" class="w-100">
            <div class="form-group row">
                <label :for="'images'+index" class="col-md-4 col-form-label text-md-right">ຮູບພາບ:</label>

                <div class="col-md-6">
                    <img :src="value.image_path? value.image_path:''" alt="" :id="'preview'+index" class="w-100">
                    <input type="hidden" :name="'length['+index+']'" value="1">
                    <input type="hidden" :name="'image_ids['+index+']'" :value="value.id? value.id:'-1'">
                    <input :id="'old_image_path'+index" type="hidden" :name="'old_image_paths['+index+']'" :value="value.image_path? value.image_path:''">
                    <input :id="'images'+index" type="file" accept="image/*" class="form-control d-none"
                        :name="'images['+index+']'" autofocus :onchange="`showPreviewImage(event, 'preview${index}', 'clearImage${index}', 'old_image_path${index}');`">
                    <div class="mt-1 w-100 d-flex justify-content-center">
                        <label :for="'images'+index" class="btn btn-primary">ເລືອກຮູບພາບ</label>
                        <label :id="'clearImage'+index" class="ml-1 btn btn-danger" :onclick="`clearPreviewImage(event, 'images${index}', 'preview${index}', 'clearImage${index}', 'old_image_path${index}');`" style="display: none;">ລົບຮູບພາບ</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label :for="'descriptions'+index" class="col-md-4 col-form-label text-md-right">ຄໍາອະທິບາຍຮູບພາບ:</label>

                <div class="col-md-6">
                    <textarea :id="'descriptions'+index" type="text" class="form-control" :name="'descriptions['+index+']'" cols="30" rows="3" autofocus v-model="value.description"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-md-4 col-md-6"><button class="btn btn-primary" @click.prevent="add()">ຮູບເພີ່ມເຕີມ</button></div>
        </div>
    </div>
</template>

<script>
export default {
    props:['images'],
    data(){
        return {
            list: [{}]
        }
    },
    methods:{
        add: function(){
            this.list.push({})
        }
        //TODO: make image removable both when add or edit
    },
    mounted(){
        this.list = JSON.parse(this.images)
    }
}
</script>
