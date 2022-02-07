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
            <i class="bi bi-x-lg menu-toggle-btn ms-5"></i>
          </small>
        </span>
      </div>
      <hr />
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">

             <router-link
            to="/terms"
            class="nav-link link-dark"
            aria-current="page"
          >
            <i class="bi bi-house-door"></i>
            شرایط
          </router-link>


        </li>
        <li>
          <router-link
            to="/facilities"
            class="nav-link link-dark"
            aria-current="page"
          >
            <i class="bi bi-house-door"></i>
            امکانات
          </router-link>
        </li>

        <!-- <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
              >
                <i class="bi bi-house-door"></i>
                امکانات
              </button>
            </h2>
            <div
              id="flush-collapseOne"
              class="accordion-collapse collapse"
              aria-labelledby="flush-headingOne"
              data-bs-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <li>
                  <a href="#" class="nav-link link-dark">
                    <i class="bi bi-house-door"></i>
                    شرایط
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link link-dark">
                    <i class="bi bi-house-door"></i>
                    شرایط
                  </a>
                </li>
              </div>
            </div>
          </div>
        </div>

        <div class="accordion accordion-flush" id="accordionFlushExample2">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne2">
              <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne2"
                aria-expanded="false"
                aria-controls="flush-collapseOne2"
              >
                <i class="bi bi-house-door"></i>
                امکانات
              </button>
            </h2>
            <div
              id="flush-collapseOne2"
              class="accordion-collapse collapse"
              aria-labelledby="flush-headingOne2"
              data-bs-parent="#accordionFlushExample2"
            >
              <div class="accordion-body">
                <li>
                  <a href="#" class="nav-link link-dark">
                    <i class="bi bi-house-door"></i>
                    شرایط
                  </a>
                </li>
                <li>
                  <a href="#" class="nav-link link-dark">
                    <i class="bi bi-house-door"></i>
                    شرایط
                  </a>
                </li>
              </div>
            </div>
          </div>
        </div>

        <span class="my-3 ps-3"> نمایش سریع </span> -->
      </ul>
    </div>
  </div>
</template>

<script>
//Sidebar
import "../../assets/main/sidebar";

export default {
  name: "Sidebar",
};
</script>

<style>
.router-link-exact-active {
  color: #fff !important;
  background-color: #0d6efd !important;
}
</style>