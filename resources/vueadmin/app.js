import { createApp } from 'vue'
import App from './App.vue'
import router from './router'


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


const app = createApp(App)
app.use(router)
app.mount('#app')