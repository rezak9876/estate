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
    document.cookie = "AC-C=ac-c;expires=Fri, 31 Dec 9999 23:59:59 GMT;path=/;SameSite=lax";
}

import axios from "axios";
import { check_permission } from "./permissions/index.js";

axios
    .get("api/v1/admin/users/login_user")
    .then(function (response) {

        const user = response.data;
        setCookie('user', JSON.stringify(user), 1)

        const app = createApp(App)
        app.directive('can', (el, binding, vnode, prevVnode) => {
            // this will be called for both `mounted` and `updated`

            if (binding.arg == null && binding.value == null)
                return true;
            const condition = check_permission(binding.arg, binding.value)

            if (!condition)
                el.outerHTML = null
        })
        app.use(router)
        app.mount('#app')
    })
    .catch(function (error) {
    });

