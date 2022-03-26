<template>
  <div id="sidebar-wrapper">
    <div
      class="d-flex flex-column flex-shrink-0 py-3 ps-1"
      style="width: 280px"
    >
      <div
        href="/"
        class="
          d-flex
          align-items-center
          mb-3 mb-md-0
          me-md-auto
          link-dark
          text-decoration-none
          m-auto
        "
      >
        <span class="fs-4">
          <i class="bi bi-cart-check-fill"></i>
          پنل مدیریت
          <small>
            <i
              class="bi bi-x-lg menu-toggle-btn ms-5"
              @click="menu - toggle"
            ></i>
          </small>
        </span>
      </div>
      <hr />
      <ul class="nav nav-pills flex-column mb-auto">
        <li v-can:index="'terms'" class="nav-item">
          <router-link
            to="/terms"
            class="nav-link link-dark"
            aria-current="page"
          >
            <i class="bi bi-house-door"></i>
            شرایط
          </router-link>
        </li>
        <li v-can:index="'facilities'">
          <router-link
            to="/facilities"
            class="nav-link link-dark"
            aria-current="page"
          >
            <i class="bi bi-house-door"></i>
            امکانات
          </router-link>
        </li>

        <div
          v-can:index="'estates'"
          class="accordion accordion-flush"
          id="accordionFlushExample2"
        >
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne2">
              <button
                class="accordion-button collapsed shadow-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne2"
                aria-expanded="false"
                aria-controls="flush-collapseOne2"
              >
                <i class="bi bi-house-door"></i>
                آگهی ها
              </button>
            </h2>
            <div
              id="flush-collapseOne2"
              class="accordion-collapse collapse"
              aria-labelledby="flush-headingOne2"
              data-bs-parent="#accordionFlushExample2"
            >
              <div class="border-bottom">
                <li v-can:create="'estates'">
                  <router-link to="/estates/create" class="nav-link link-dark">
                    <i class="bi bi-house-door"></i>
                    ایجاد آگهی
                  </router-link>
                </li>
                <li>
                  <router-link to="/estates" class="nav-link link-dark">
                    <i class="bi bi-house-door"></i>
                    لیست آگهی ها
                  </router-link>
                </li>
              </div>
            </div>
          </div>
        </div>

        <li v-can:index="'roles'">
          <router-link
            to="/roles"
            class="nav-link link-dark"
            aria-current="page"
          >
            <i class="bi bi-house-door"></i>
            نقش ها
          </router-link>
        </li>

        <li v-can:index="'users'">
          <router-link
            to="/users"
            class="nav-link link-dark"
            aria-current="page"
          >
            <i class="bi bi-house-door"></i>
            کاربران
          </router-link>
        </li>

        <li v-can:index="'settings'">
          <router-link
            to="/settings/1"
            class="nav-link link-dark"
            aria-current="page"
          >
            <i class="bi bi-house-door"></i>
            تنظیمات
          </router-link>
        </li>

        <li>
          <a href="/" class="nav-link link-dark" aria-current="page">
            <i class="bi bi-house-door"></i>
            مشاهده سایت
          </a>
        </li>

        <!-- <span class="my-3 ps-3"> نمایش سریع </span> -->
      </ul>
    </div>
  </div>
</template>

<script>
//Sidebar
import * as $ from "jquery";
import { onMounted } from "vue";

export default {
  name: "Sidebar",
  setup() {
    onMounted(() => {
      $("body").click(function (e) {
        if ($("#hamburger-icon").hasClass("d-none")) {
          $("#wrapper").addClass("menuDisplayed");
          $("#sidebar-wrapper").addClass("d-none");
          $("#hamburger-icon").removeClass("d-none");
        }
      });

      $(".menu-toggle-btn").click(function (e) {
        $("#wrapper").toggleClass("menuDisplayed");
        $("#sidebar-wrapper").toggleClass("d-none");
        $("#hamburger-icon").toggleClass("d-none");
        e.stopPropagation();
      });

      $("#sidebar-wrapper").click(function (e) {
        e.stopPropagation();
      });
    });
  },
};
</script>

<style>
.router-link-exact-active {
  color: #fff !important;
  background-color: #0d6efd !important;
}
</style>