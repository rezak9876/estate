<template>
  <div id="wrapper">
    <Sidebar />
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <div class="d-flex justify-content-between my-3 w-100">
          <div>
            <i
              class="bi bi-justify menu-toggle-btn d-none ms-2"
              id="hamburger-icon"
            ></i>
          </div>

          <div class="dropdown float-end">
            <a
              href="#"
              class="
                d-flex
                align-items-center
                link-dark
                text-decoration-none
                dropdown-toggle
              "
              id="dropdownUser2"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <strong class="me-3">مدیر</strong>
              <img
                src="./assets/images/noimage.png"
                alt=""
                class="rounded-circle me-2"
                width="32"
                height="32"
              />
            </a>
            <ul
              class="dropdown-menu text-small shadow"
              aria-labelledby="dropdownUser2"
            >
              <li><a class="dropdown-item" href="#">ویرایش پروفایل</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item" href="#">خروج</a></li>
            </ul>
          </div>
        </div>

        <hr />

        <div
          id="toast-background"
          class="
            toast
            align-items-center
            text-white
            border-0
            position-fixed
            top-0
            start-0
            m-3
          "
          :class="classObject"
          role="alert"
          aria-live="assertive"
          aria-atomic="true"
        >
          <div class="d-flex">
            <div class="toast-body">{{ message }}</div>
            <button
              type="button"
              class="btn-close btn-close-white me-2 m-auto"
              data-bs-dismiss="toast"
              aria-label="Close"
            ></button>
          </div>
        </div>
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import Sidebar from "./components/sections/Sidebar.vue";
import { ref } from "vue";
import * as $ from "jquery";
    import axios from "axios";

export default {
  name: "App",
  beforeCreate() {
    
    // const token = "Bearer " + getCookie("token");

    // axios.defaults.headers.common["Authorization"] = token;
    axios.defaults.headers["Content-Type"] = "application/json";
    axios.defaults.headers["responseType"] = "json";
    axios.defaults.headers["Accept"] = "application/json";
    axios.defaults.baseURL = 'http://127.0.0.1:8000/api/v1/admin';

    
  },
  components: {
    Sidebar,
  },
  setup() {
    const classObject = ref("bg-warning");
    const message = ref("سلام");

    function getCookie(cname) {
      let name = cname + "=";
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(";");
      for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == " ") {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }
    let token = "Bearer " + getCookie("token");

    function toastShow(status, fmessage) {
      message.value = fmessage;
      function allll() {
        switch (status) {
          case "error":
            classObject.value = "bg-danger";
            break;
          case "success":
            classObject.value = "bg-success";
            break;
          default:
            classObject.value = "bg-warning";
        }
      }
      $.when(allll()).then(function () {
        var toastElList = [].slice.call(document.querySelectorAll(".toast"));
        var toastList = toastElList.map(function (toastEl) {
          return new bootstrap.Toast(toastEl);
        });
        toastList.forEach((toast) => toast.show());
      });
    }
    return { message, classObject, toastShow, token };
  },
  provide() {
    return {
      toastShow: this.toastShow,
    };
  },
};
</script>

<style>
</style>
