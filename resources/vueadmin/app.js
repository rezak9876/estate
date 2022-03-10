import { createApp } from 'vue'
import App from './App.vue'
import router from './router/index'


// <-- CSS START -->

// font
import './assets/fonts/IRANSans/style.css'

//Bootstrap CSS
import '../../node_modules/bootstrap/dist/css/bootstrap.rtl.min.css'
import '../../node_modules/bootstrap/dist/js/bootstrap.bundle'
//Bootstrap Icons
import 'bootstrap-icons/font/bootstrap-icons.css'

//Custom Css
import './assets/css/custom.css'




//  <-- JS START -->

//JQuery
import 'jquery/dist/jquery.min.js'

// //Popper
// import '@popperjs/core/dist/umd/popper.min.js'
// // Bootstrap
// import 'bootstrap/dist/js/bootstrap.min.js'

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}


setCookie('user', JSON.stringify({
    id: 1,
    name: 'Victory Osayi',
    is_editor: true,
    is_admin: false,
    // you can have role based permission list or access control list possibly from database
    permissions: {
        estate: ['create']
    }
}), 1)

const app = createApp(App)
app.directive('can', (el, binding, vnode, prevVnode) => {
    // this will be called for both `mounted` and `updated`

    console.clear()
    console.log(el, binding, vnode, prevVnode)
    function getCookie(cname) {
        let name = cname + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    const user = JSON.parse(getCookie('user'))

    if (!user.permissions[binding.value].includes(binding.arg))
        el.outerHTML = null
})
app.use(router)
app.mount('#app')