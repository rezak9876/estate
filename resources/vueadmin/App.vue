<template>
  <div id="wrapper">
    <Sidebar />
    <div id="page-content-wrapper">
      <div class="container-fluid">
        <div
          class="
            d-flex
            justify-content-between
            my-3
            w-100
            position-sticky
            top-0
            bg-white
            p-3
          "
          style="z-index: 1"
        >
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
              <strong class="me-3">{{ user.name }}</strong>
              <img
                :src="user.picture"
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
              <li>
                <router-link
                  :to="{ name: 'profile-update' }"
                  class="nav-link link-dark p-0"
                  aria-current="page"
                >
                  <a class="dropdown-item" href="#">ویرایش پروفایل</a>
                </router-link>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="#" @click="sign_out">خروج</a>
              </li>
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
          style="z-index: 1"
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
import { store } from "./store/index";

export default {
  name: "App",
  beforeCreate() {
    const base_url = window.location.origin + "/api/v1/admin";
    axios.defaults.headers["Content-Type"] = "application/json";
    axios.defaults.headers["responseType"] = "json";
    axios.defaults.headers["Accept"] = "application/json";
    axios.defaults.baseURL = base_url;
    //remove admin loading div
    const panel_loading = document.getElementById("panel_loading");
    panel_loading.remove();
  },
  components: {
    Sidebar,
  },
  setup() {
    const classObject = ref("bg-warning");
    const message = ref("سلام");

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

    function sign_out() {
      axios
        .post(location.origin + "/logout")
        .then(function (response) {
          location.replace("/login");
        })
        .catch(function (error) {});
    }

    const user = store.user;
    return { message, classObject, toastShow, sign_out, user };
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
