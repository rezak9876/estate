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

import axios from "axios";

axios
    .get("api/v1/admin/users/login_user")
    .then(function (response) {

        const user = response.data;
        console.log(user)
        setCookie('user', JSON.stringify(user), 1)

        const app = createApp(App)
        app.directive('can', (el, binding, vnode, prevVnode) => {
            // this will be called for both `mounted` and `updated`

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

            if (typeof binding.value !== 'undefined')
                if (!user.permissions[binding.value].includes(binding.arg))
                    el.outerHTML = null
        })
        app.use(router)
        app.mount('#app')
    })
    .catch(function (error) {
    });

