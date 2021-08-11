/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
$('.alert').delay(5000).slideUp()
window.openSidebar = function(){
    var sidebar = document.getElementById('sidebar');
    sidebar.style.width = '300px';
    sidebar.style.paddingLeft = '0px';
}
window.closeSidebar = function(){
    var sidebar = document.getElementById('sidebar');
    sidebar.style.width = '50px';
    sidebar.style.paddingLeft = '50px';
}
window.showPreviewImage = function(event, target = 'previewImage', clearBtnId = 'clearImage', oldTarget = 'old_image_path'){
    event.preventDefault();
    let reader = new FileReader();
    reader.onload = function(){
        document.getElementById(target).src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
    let clearBtn = document.getElementById(clearBtnId);
    clearBtn.style.display = 'block';
    document.getElementById(oldTarget).value = '';
}
window.clearPreviewImage = function(event, inputId = 'image_path', target = 'previewImage', clearBtnId = 'clearImage', oldTarget = 'old_image_path'){
    event.preventDefault();
    document.getElementById(inputId).value = '';
    document.getElementById(target).src = '';
    let clearBtn = document.getElementById(clearBtnId);
    clearBtn.style.display = 'none';
    document.getElementById(oldTarget).value = '';
}
window.showFileName = function(inputId = 'file', target = 'fileName'){
    let input = document.getElementById(inputId).value
    document.getElementById(target).innerHTML = input.replace("C:\\fakepath\\", "")
}
window.submitDeleteForm = function(event, text = "ທ່ານແນ່ໃຈບໍວ່າຕ້ອງການດໍາເນີນການຕໍ່?", formId = 'delete-form'){
    event.preventDefault();
    swal({text: text, icon: 'warning', buttons: true, dangerMode: true})
        .then( res => {
            if(res){
                document.getElementById(formId).submit();
            }
        });
}
