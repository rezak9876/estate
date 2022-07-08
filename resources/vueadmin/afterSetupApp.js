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

import { check_permission } from "./permissions/index.js";




const app = createApp(App)
app.directive('can', (el, binding, vnode, prevVnode) => {
    // this will be called for both `mounted` and `updated`

    if (binding.arg == null && binding.value == null)
        return true;
    const condition = check_permission(binding.arg, binding.value)

    if (!condition)
        el.remove()
})
app.use(router)
app.mount('#app')