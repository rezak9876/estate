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
        <li v-for="(row, index) in sidebar" :key="index" class="nav-item">
          <router-link
            v-if="row.type == 'router-link'"
            v-can:[row.permission?row.permission.arg:null]="
              row.permission ? row.permission.value : null
            "
            :to="row.link"
            class="nav-link link-dark"
            aria-current="page"
          >
            <i class="bi bi-house-door"></i>
            {{ row.persianName }}
          </router-link>

          <div
            v-if="row.type == 'div'"
            v-can:[row.permission?row.permission.arg:null]="
              row.permission ? row.permission.value : null
            "
            class="accordion accordion-flush"
            id="accordionFlushExample2"
          >
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne2">
                <button
                  class="accordion-button collapsed shadow-none"
                  type="button"
                  data-bs-toggle="collapse"
                  :data-bs-target="'#flush-headingOne-' + row.id"
                  aria-expanded="false"
                  :aria-controls="'flush-headingOne-' + row.id"
                >
                  <i class="bi bi-house-door"></i>
                  {{ row.persianName }}
                </button>
              </h2>
              <div
                :id="'flush-headingOne-' + row.id"
                class="accordion-collapse collapse"
                aria-labelledby="flush-headingOne2"
                data-bs-parent="#accordionFlushExample2"
              >
                <div class="border-bottom">
                  <li
                    v-for="(child, child_index) in row.children"
                    :key="child_index"
                    v-can:[child.permission?child.permission.arg:null]="
                      child.permission ? child.permission.value : null
                    "
                  >
                    <router-link :to="child.link" class="nav-link link-dark">
                      <i class="bi bi-house-door"></i>
                      {{ child.persianName }}
                    </router-link>
                  </li>
                </div>
              </div>
            </div>
          </div>
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
import sidebar from "../../sidebar/index.js";

export default {
  name: "Sidebar",
  setup() {
    onMounted(() => {
      if (
        /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
          navigator.userAgent
        )
      ) {
        $("body").click(function (e) {
          if ($("#hamburger-icon").hasClass("d-none")) {
            $("#wrapper").addClass("menuDisplayed");
            $("#sidebar-wrapper").addClass("d-none");
            $("#hamburger-icon").removeClass("d-none");
          }
        });

        $("#sidebar-wrapper").click(function (e) {
          e.stopPropagation();
        });

        document.addEventListener("touchstart", handleTouchStart, false);
        document.addEventListener("touchmove", handleTouchMove, false);

        var xDown = null;
        var yDown = null;

        function getTouches(evt) {
          return (
            evt.touches || // browser API
            evt.originalEvent.touches
          ); // jQuery
        }

        function handleTouchStart(evt) {
          const firstTouch = getTouches(evt)[0];
          xDown = firstTouch.clientX;
          yDown = firstTouch.clientY;
        }

        function handleTouchMove(evt) {
          if (!xDown || !yDown) {
            return;
          }

          var xUp = evt.touches[0].clientX;
          var yUp = evt.touches[0].clientY;

          var xDiff = xDown - xUp;
          var yDiff = yDown - yUp;

          if (Math.abs(xDiff) > Math.abs(yDiff)) {
            /*most significant*/

            if (xDiff > 0) {
              /* right swipe */
              $("#wrapper").removeClass("menuDisplayed");
              $("#sidebar-wrapper").removeClass("d-none");
              $("#hamburger-icon").addClass("d-none");
            } else {
              /* left swipe */
              $("#wrapper").addClass("menuDisplayed");
              $("#sidebar-wrapper").addClass("d-none");
              $("#hamburger-icon").removeClass("d-none");
            }
          } else {
            if (yDiff > 0) {
              /* down swipe */
            } else {
              /* up swipe */
            }
          }
          /* reset values */
          xDown = null;
          yDown = null;
        }
      }

      $(".menu-toggle-btn").click(function (e) {
        $("#wrapper").toggleClass("menuDisplayed");
        $("#sidebar-wrapper").toggleClass("d-none");
        $("#hamburger-icon").toggleClass("d-none");
        e.stopPropagation();
      });
    });

    return { sidebar };
  },
};
</script>

<style>
.router-link-exact-active {
  color: #fff !important;
  background-color: #0d6efd !important;
}
</style>