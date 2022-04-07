<template>
  <Show :module="module">
    <GetLoading v-if="loading" />

    <div v-else class="page-content page-container" id="page-content">
      <div class="padding">
        <div class="container d-flex justify-content-center">
          <div class="card card-bordered w-100">
            <div class="card-header">
              <h4 class="card-title"><strong>ارسال پیام</strong></h4>
              <img
                class="avatar"
                src="https://img.icons8.com/color/36/000000/administrator-male.png"
                alt="..."
              />
            </div>
            <div
              class="ps-container ps-theme-default ps-active-y"
              id="chat-content"
              style="overflow-y: scroll !important; height: 400px !important ;  background-image: url('/images/setting/chat_background.png');"
            >
              <div class="position-absolute bottom-0 mh-100 w-100">
                <div
                  v-for="(chatline, chatline_index) in chatLines"
                  :key="chatline_index"
                >
                  <div
                    class="media media-chat"
                    :class="chatline.type == 'me' ? 'media-chat-reverse' : null"
                  >
                    <div class="media-body">
                      <!-- <p>Hi</p>
                  <p>How are you ...???</p> -->
                      <div class="d-flex align-items-end">
                        <p
                          v-html="
                            chatline.message.replace(/(?:\r\n|\r|\n)/g, '<br>')
                          "
                        ></p>
                        <i
                          v-if="chatline.send_status == 'send'"
                          class="bi bi-check"
                        ></i>
                        <i
                          v-else-if="chatline.send_status == 'received'"
                          class="bi bi-check-all"
                        ></i>
                        <i
                          v-else-if="chatline.send_status == 'seen'"
                          class="bi bi-check-all text-primary"
                        ></i>
                      </div>
                      <p class="meta">
                        <time datetime="2018">{{ chatline.time }}</time>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="media media-meta-day">Today</div> -->
              <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px">
                <div
                  class="ps-scrollbar-x"
                  tabindex="0"
                  style="left: 0px; width: 0px"
                ></div>
              </div>
              <div
                class="ps-scrollbar-y-rail"
                style="top: 0px; height: 0px; right: 2px"
              >
                <div
                  class="ps-scrollbar-y"
                  tabindex="0"
                  style="top: 0px; height: 2px"
                ></div>
              </div>
            </div>
            <div
              class="publisher bt-1 border-light d-flex align-items-end"
              style="direction: ltr"
            >
              <textarea
                @keyup.shift.enter="setRowsTextarea"
                @keyup.delete="setRowsTextarea"
                @keyup.enter.exact="sendMessage"
                v-model="chat_line_object.message"
                :rows="message_box_row"
                id="message-box"
                class="publisher-input"
                type="text"
                placeholder="پیام خود را بنویسید ..."
              />
              <span class="publisher-btn file-group">
                <i class="bi bi-paperclip file-browser"></i>
                <input type="file" />
              </span>
              <!-- <a class="publisher-btn" href="#" data-abc="true"
                ><i class="fa fa-smile"></i
              ></a> -->
              <button
                @click="sendMessage"
                class="publisher-btn text-info"
                data-abc="true"
              >
                <i class="bi bi-send"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </Show>
</template>

<script>
import Show from "../../components/Modules/Show.vue";
import module from "./config";
import axios from "axios";
import { ref, onMounted } from "vue";
import { useRoute } from "vue-router";
import GetLoading from "../../components/sections/GetLoading.vue";
import * as $ from "jquery";
import { waitForElm } from "../../helper/dom";

export default {
  components: {
    Show,
    GetLoading,
  },
  setup() {
    const loading = ref(true);
    const chatLines = ref([]);
    const route = useRoute();
    let id = route.params.hasOwnProperty("id")
      ? route.params.id
      : "general_user";

    axios
      .get("/" + module.pluralName + "/" + id)
      .then(function (response) {
        switch (response.status) {
          case 204:
            break;
          default:
            if (response.data.hasOwnProperty("chat_id"))
              id = response.data.chat_id;
            chatLines.value = response.data.data;
            break;
        }
      })
      .catch(function (error) {
        if (error.response.status == 403) router.push("/");
        if (error.response.status == 404) router.push("/");
      })
      .then(function () {
        loading.value = false;
      });

    const chat_line_object = ref({
      type: "me",
      message: null,
      time: null,
      send_status: "send",
    });

    function scroll_to_end_of_chat_content() {
      var objDiv = document.getElementById("chat-content");
      objDiv.scrollTop = objDiv.scrollHeight;
    }

    function sendMessage() {
      if (chat_line_object.value.message == null) return false;

      let new_chat_line;
      let added_index;
      function add_chat_line_to_screen() {
        var today = new Date();
        var time = today.getHours() + ":" + today.getMinutes();
        chat_line_object.value.time = time;
        new_chat_line = Object.assign({}, chat_line_object.value);
        added_index = chatLines.value.push(new_chat_line) - 1;
        chat_line_object.value.message = null;
      }

      $.when(add_chat_line_to_screen()).then(scroll_to_end_of_chat_content);

      axios
        .post("/" + module.pluralName + "/send_chat", {
          chat_id: id,
          content: new_chat_line.message,
        })
        .then(function (response) {
          if (response.data.hasOwnProperty("chat_id"))
            id = response.data.chat_id;

          chatLines.value[added_index].send_status = "received";
        })
        .catch(function (error) {
          if (error.response.status == 403) router.push("/");
          if (error.response.status == 404) router.push("/");
        })
        .then(function () {
          loading.value = false;
        });
    }

    waitForElm("#chat-content").then((elm) => {
      scroll_to_end_of_chat_content();
    });

    const message_box_row = ref(1);

    function setRowsTextarea() {
      var lines = chat_line_object.value.message.split(/\r|\r\n|\n/);
      var count = lines.length;
      message_box_row.value = count;
    }
    return {
      chatLines,
      module,
      loading,
      sendMessage,
      chat_line_object,
      setRowsTextarea,
      message_box_row,
    };
  },
};
</script>

<style>
.card-bordered {
  border: 1px solid #ebebeb;
}

.card {
  border: 0;
  border-radius: 0px;
  margin-bottom: 30px;
  -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
  box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
  -webkit-transition: 0.5s;
  transition: 0.5s;
}

body {
  background-color: #f9f9fa;
}

.card-header:first-child {
  border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-header {
  display: -webkit-box;
  display: flex;
  -webkit-box-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  align-items: center;
  padding: 15px 20px;
  background-color: transparent;
  border-bottom: 1px solid rgba(77, 82, 89, 0.07);
}

.card-header .card-title {
  padding: 0;
  border: none;
}

h4.card-title {
  font-size: 17px;
}

.card-header > *:last-child {
  margin-right: 0;
}

.card-header > * {
  margin-left: 8px;
  margin-right: 8px;
}

.btn-secondary {
  color: #4d5259 !important;
  background-color: #e4e7ea;
  border-color: #e4e7ea;
  color: #fff;
}

.btn-xs {
  font-size: 11px;
  padding: 2px 8px;
  line-height: 18px;
}

.btn-xs:hover {
  color: #fff !important;
}

.card-title {
  font-family: Roboto, sans-serif;
  font-weight: 300;
  line-height: 1.5;
  margin-bottom: 0;
  padding: 15px 20px;
  border-bottom: 1px solid rgba(77, 82, 89, 0.07);
}

.ps-container {
  position: relative;
}

.ps-container {
  -ms-touch-action: auto;
  touch-action: auto;
  overflow: hidden !important;
  -ms-overflow-style: none;
}

.media-chat {
  padding-right: 64px;
  margin-bottom: 0;
}

.media {
  padding: 16px 12px;
  -webkit-transition: background-color 0.2s linear;
  transition: background-color 0.2s linear;
}

.media .avatar {
  flex-shrink: 0;
}

.avatar {
  position: relative;
  display: inline-block;
  width: 36px;
  height: 36px;
  line-height: 36px;
  text-align: center;
  border-radius: 100%;
  background-color: #f5f6f7;
  color: #8b95a5;
  text-transform: uppercase;
}

.media-chat .media-body {
  -webkit-box-flex: initial;
  flex: initial;
  display: table;
}

.media-body {
  min-width: 0;
}

.media-chat .media-body p {
  position: relative;
  padding: 6px 8px;
  margin: 4px 0;
  background-color: #f5f6f7;
  border-radius: 3px;
  font-weight: 100;
  color: #9b9b9b;
}

.media > * {
  margin: 0 8px;
}

.media-chat .media-body p.meta {
  background-color: transparent !important;
  padding: 0;
  opacity: 0.8;
}

.media-meta-day {
  -webkit-box-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  align-items: center;
  margin-bottom: 0;
  color: #8b95a5;
  opacity: 0.8;
  font-weight: 400;
}

.media {
  padding: 16px 12px;
  -webkit-transition: background-color 0.2s linear;
  transition: background-color 0.2s linear;
}

.media-meta-day::before {
  margin-right: 16px;
}

.media-meta-day::before,
.media-meta-day::after {
  content: "";
  -webkit-box-flex: 1;
  flex: 1 1;
  border-top: 1px solid #ebebeb;
}

.media-meta-day::after {
  content: "";
  -webkit-box-flex: 1;
  flex: 1 1;
  border-top: 1px solid #ebebeb;
}

.media-meta-day::after {
  margin-left: 16px;
}

.media-chat.media-chat-reverse {
  padding-right: 12px;
  padding-left: 64px;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: reverse;
  flex-direction: row-reverse;
}

.media-chat {
  padding-right: 64px;
  margin-bottom: 0;
}

.media {
  padding: 16px 12px;
  -webkit-transition: background-color 0.2s linear;
  transition: background-color 0.2s linear;
}

.media-chat.media-chat-reverse .media-body p {
  float: right;
  clear: right;
  background-color: #48b0f7;
  color: #fff;
}

.media-chat .media-body p.meta {
  color: #9b9b9b;
}

.media-chat .media-body p {
  position: relative;
  padding: 6px 8px;
  margin: 4px 0;
  background-color: #f5f6f7;
  border-radius: 3px;
}

.border-light {
  border-color: #f1f2f3 !important;
}

.bt-1 {
  border-top: 1px solid #ebebeb !important;
}

.publisher {
  position: relative;
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
  align-items: center;
  padding: 12px 20px;
  background-color: #f9fafb;
}

.publisher > *:first-child {
  margin-left: 0;
}

.publisher > * {
  margin: 0 8px;
}

.publisher-input {
  -webkit-box-flex: 1;
  flex-grow: 1;
  border: none;
  outline: none !important;
  background-color: transparent;
  direction: rtl;
  overflow-y: hidden;
}

button,
input,
optgroup,
select,
textarea {
  font-family: Roboto, sans-serif;
  font-weight: 300;
}

.publisher-btn {
  background-color: transparent;
  border: none;
  color: #8b95a5;
  font-size: 16px;
  cursor: pointer;
  overflow: -moz-hidden-unscrollable;
  -webkit-transition: 0.2s linear;
  transition: 0.2s linear;
}

.file-group {
  position: relative;
  overflow: hidden;
}

.publisher-btn {
  background-color: transparent;
  border: none;
  color: #cac7c7;
  font-size: 16px;
  cursor: pointer;
  overflow: -moz-hidden-unscrollable;
  -webkit-transition: 0.2s linear;
  transition: 0.2s linear;
}

.file-group input[type="file"] {
  position: absolute;
  opacity: 0;
  z-index: -1;
  width: 20px;
}

.text-info {
  color: #48b0f7 !important;
}

.media.media-chat:not(.media-chat-reverse) {
  direction: ltr;
}
</style>