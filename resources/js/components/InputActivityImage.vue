<template>
    <div class="w-100">
        <div v-for="(value, index) in list" :key="index" class="w-100">
            <div class="form-group row">
                <label :for="'images'+index" class="col-md-4 col-form-label text-md-right">ຮູບພາບ:</label>

                <div class="col-md-6">
                    <img src="" alt="" :id="'preview'+index" class="w-100">
                    <input :id="'images'+index" type="file" accept="image/*" class="form-control d-none"
                        name="images[]" autofocus :onchange="`showPreviewImage(event, 'preview${index}');`">
                    <div class="mt-1 w-100 d-flex justify-content-center">
                        <label :for="'images'+index" class="btn btn-primary">ເລືອກຮູບພາບ</label>
                        <label id="clearImage" class="ml-1 btn btn-danger" :onclick="`clearPreviewImage(event, 'images', 'preview${index}', 'clearImage');`" style="display: none;">ລົບຮູບພາບ</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label :for="'descriptions'+index" class="col-md-4 col-form-label text-md-right">ຄໍາອະທິບາຍຮູບພາບ:</label>

                <div class="col-md-6">
                    <textarea :id="'descriptions'+index" type="text" class="form-control" name="descriptions[]" cols="30" rows="3" autofocus></textarea>
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
    props:['descriptions'],
    data(){
        return {
            list: [{}]
        }
    },
    methods:{
        add: function(){
            this.list.push({})
        }
    }
}
</script>
