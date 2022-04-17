<template>
  <Show :module="module">
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ارسال فایل</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div
              class="
                Message
                message-list-item
                last-in-group last-in-list
                open
                shown
              "
            >
              <div class="content-inner" dir="auto">
                <div class="File interactive">
                  <div class="file-icon-container">
                    <div class="file-icon default">
                      <span class="file-ext" dir="auto"
                        ><i class="bi bi-download text-white"></i
                      ></span>
                    </div>
                    <i class="action-icon icon-download"></i>
                  </div>
                  <div class="file-info me-3">
                    <div class="file-title" dir="auto">
                      {{ file_details.title }}
                    </div>
                    <div class="file-subtitle" dir="auto">
                      <span>{{ getSize(file_details.size) }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              بستن
            </button>
            <button
              @click="sendFile"
              type="button"
              class="btn btn-primary"
              data-bs-dismiss="modal"
            >
              ارسال
            </button>
          </div>
        </div>
      </div>
    </div>

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
              style="
                overflow-y: scroll !important;
                height: 400px !important ;
                background-image: url('/images/chats/chat_background.png');
              "
            >
              <div class="position-absolute bottom-0 mh-100 w-100">
                <div
                  v-for="(chatline, chatline_index) in chatLines"
                  :key="chatline_index"
                >
                  <div
                    class="media media-chat"
                    :class="
                      chatline.owntype == 'me' ? 'media-chat-reverse' : null
                    "
                  >
                    <div class="media-body">
                      <!-- <p>Hi</p>
                  <p>How are you ...???</p> -->

                      <div v-if="chatline.content_type == 'text'">
                        <div>
                          <div
                            class="
                              Message
                              message-list-item
                              last-in-group last-in-list
                              open
                              shown
                            "
                            :class="chatline.owntype == 'me' ? 'own' : null"
                          >
                            <div class="content-inner" dir="auto">
                              <div class="File interactive">
                                <div
                                  class="file-info"
                                  v-html="
                                    chatline.content.replace(
                                      /(?:\r\n|\r|\n)/g,
                                      '<br>'
                                    )
                                  "
                                ></div>
                              </div>
                              <p
                                class="
                                  text-content
                                  with-meta with-outgoing-icon
                                "
                                dir="auto"
                              >
                                <span class="MessageMeta" dir="ltr"
                                  ><span
                                    class="message-time"
                                    title="Apr 8, 2022, 5:58:34 AM"
                                    >{{ chatline.time }}</span
                                  >
                                  <div
                                    v-if="chatline.owntype == 'me'"
                                    class="MessageOutgoingStatus"
                                  >
                                    <i
                                      v-if="chatline.send_status == 'send'"
                                      class="bi bi-check"
                                    ></i>
                                    <i
                                      v-else-if="
                                        chatline.send_status == 'received'
                                      "
                                      class="bi bi-check-all"
                                    ></i>
                                    <i
                                      v-else-if="chatline.send_status == 'seen'"
                                      class="bi bi-check-all text-primary"
                                    ></i></div
                                ></span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div v-if="chatline.content_type == 'file'">
                        <div
                          class="
                            Message
                            message-list-item
                            last-in-group last-in-list
                            open
                            shown
                          "
                          :class="chatline.owntype == 'me' ? 'own' : null"
                        >
                          <div class="content-inner" dir="auto">
                            <div class="File interactive">
                              <div class="file-icon-container">
                                <a :href="chatline.file.link" target="_blank">
                                  <div class="file-icon default">
                                    <span class="file-ext" dir="auto">
                                      <i
                                        v-if="chatline.file.link"
                                        class="bi bi-download text-white"
                                      >
                                      </i>
                                      <i v-else class="bi bi-three-dots"></i>
                                    </span>
                                  </div>
                                </a>
                                <i class="action-icon icon-download"></i>
                              </div>
                              <div class="file-info">
                                <div class="file-title" dir="auto">
                                  {{ chatline.file.title }}
                                </div>
                                <div class="file-subtitle" dir="auto">
                                  <span>{{ getSize(chatline.file.size) }}</span>
                                </div>
                              </div>
                            </div>
                            <p
                              class="text-content with-meta with-outgoing-icon"
                              dir="auto"
                            >
                              <span class="MessageMeta" dir="ltr"
                                ><span
                                  class="message-time"
                                  title="Apr 8, 2022, 5:58:34 AM"
                                  >{{ chatline.time }}</span
                                >
                                <div
                                  v-if="chatline.owntype == 'me'"
                                  class="MessageOutgoingStatus"
                                >
                                  <i
                                    v-if="chatline.send_status == 'send'"
                                    class="bi bi-check"
                                  ></i>
                                  <i
                                    v-else-if="
                                      chatline.send_status == 'received'
                                    "
                                    class="bi bi-check-all"
                                  ></i>
                                  <i
                                    v-else-if="chatline.send_status == 'seen'"
                                    class="bi bi-check-all text-primary"
                                  ></i></div
                              ></span>
                            </p>
                          </div>
                        </div>
                      </div>
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
                v-model="chat_line_object.content"
                :rows="message_box_row"
                id="message-box"
                class="publisher-input"
                type="text"
                placeholder="پیام خود را بنویسید ..."
              />
              <div class="mb-md-2 d-flex">
                <span class="publisher-btn file-group">
                  <label for="upload-file" style="cursor: pointer"
                    ><i class="bi bi-paperclip file-browser"></i
                  ></label>
                  <input
                    type="file"
                    id="upload-file"
                    v-on:change="excelfilechanges($event)"
                  />
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
    </div>
  </Show>
</template>

<script>
import Show from "../../components/Modules/Show.vue";
import module from "./config";
import axios from "axios";
import { ref, onMounted, watch } from "vue";
import { useRoute } from "vue-router";
import GetLoading from "../../components/sections/GetLoading.vue";
import * as $ from "jquery";
import { waitForElm } from "../../helper/dom";
import Pusher from "pusher-js";
import { user } from "../../permissions/index";

import Echo from "laravel-echo";

export default {
  components: {
    Show,
    GetLoading,
  },
  setup() {
    const loading = ref(true);
    const chatLines = ref([]);
    const route = useRoute();
    const chat_id = ref(null);

    function scroll_to_end_of_chat_content() {
      var objDiv = document.getElementById("chat-content");
      objDiv.scrollTop = objDiv.scrollHeight;
    }

    function set_echo_listener() {
      let Echoo = new Echo({
        broadcaster: "pusher",
        key: process.env.MIX_PUSHER_APP_KEY,
        cluster: process.env.MIX_PUSHER_APP_CLUSTER,
        forceTLS: true,
      });

      let channel = Echoo.private("my-channel." + chat_id.value);
      channel.listen(".my-event", function (data) {
        // alert(data)
        if (user.id != data.user_id) {
          $.when(chatLines.value.push(data.data)).then(
            scroll_to_end_of_chat_content
          );
        }
      });
    }
    if (route.params.hasOwnProperty("id")) {
      chat_id.value = route.params.id;
      set_echo_listener();
    } else {
      chat_id.value = "general_user";

      watch(chat_id, (count) => {
        if (typeof count == "number") {
          set_echo_listener();
        }
      });
    }

    axios
      .get("/" + module.pluralName + "/" + chat_id.value)
      .then(function (response) {
        switch (response.status) {
          case 204:
            break;
          default:
            if (response.data.hasOwnProperty("chat_id"))
              chat_id.value = response.data.chat_id;
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
      owntype: "me",
      content: null,
      time: null,
      send_status: "send",
      content_type: "text",
    });

    function sendMessage() {
      message_box_row.value = 1;
      chat_line_object.value.content_type = "text";
      send();
    }

    waitForElm("#chat-content").then((elm) => {
      scroll_to_end_of_chat_content();
    });

    const message_box_row = ref(1);

    function setRowsTextarea() {
      var lines = chat_line_object.value.content.split(/\r|\r\n|\n/);
      var count = lines.length;
      message_box_row.value = count;
    }

    function excelfilechanges(event) {
      const target = event.target;
      const file = target.files[0];
      chat_line_object.value["link_file"] = event.target.files[0];

      file_details.value.title = file.name;
      file_details.value.size = file.size;

      let myModal = new bootstrap.Modal(
        document.getElementById("exampleModal"),
        {
          keyboard: false,
        }
      );
      myModal.show();
    }
    function sendFile() {
      chat_line_object.value.content_type = "file";
      send();
      // let myModal = new bootstrap.Modal(
      //   document.getElementById("exampleModal"),
      //   {
      //     keyboard: false,
      //   }
      // );
      // myModal.hide();
    }
    const file_details = ref({
      title: null,
      size: null,
    });

    function send() {
      let formDataAxios = new FormData();
      formDataAxios.append("chat_id", chat_id.value);
      let added_index;

      if (chat_line_object.value.content_type == "file") {
        let new_chat_line;
        function add_file_line_to_screen() {
          var today = new Date();
          var time = today.getHours() + ":" + today.getMinutes();
          chat_line_object.value.time = time;

          let file = file_details.value;
          chat_line_object.value.file = {
            title: file.title,
            link: null,
            size: file.size,
          };
          new_chat_line = Object.assign({}, chat_line_object.value);
          added_index = chatLines.value.push(new_chat_line) - 1;
          chat_line_object.value.content = null;
        }

        $.when(add_file_line_to_screen()).then(scroll_to_end_of_chat_content);

        formDataAxios.append("file", chat_line_object.value["link_file"]);
        formDataAxios.append("content_type", "file");
      } else {
        if (chat_line_object.value.content == null) return false;

        let new_chat_line;
        function add_chat_line_to_screen() {
          var today = new Date();
          var time = today.getHours() + ":" + today.getMinutes();
          chat_line_object.value.time = time;
          new_chat_line = Object.assign({}, chat_line_object.value);
          added_index = chatLines.value.push(new_chat_line) - 1;
          chat_line_object.value.content = null;
          formDataAxios.append("content", new_chat_line.content);
        }

        $.when(add_chat_line_to_screen()).then(scroll_to_end_of_chat_content);
        formDataAxios.append("content_type", "text");
      }

      axios
        .post("/" + module.pluralName + "/send_chat", formDataAxios)
        .then(function (response) {
          if (response.data.hasOwnProperty("chat_id"))
            chat_id.value = response.data.chat_id;
          if (response.data.hasOwnProperty("link"))
            chatLines.value[added_index].file.link = response.data.link;

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

    function getSize(size) {
      if (size > 1000000) {
        size = size / 1000000 + " MB";
      } else if (size > 1000) {
        size = size / 1000 + " kB";
      } else {
        size = size + " B";
      }
      return size;
    }

    return {
      chatLines,
      module,
      loading,
      sendMessage,
      chat_line_object,
      setRowsTextarea,
      message_box_row,
      excelfilechanges,
      file_details,
      sendFile,
      getSize,
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

.media > * {
  margin: 0 8px;
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

/* file styles */
.File.interactive {
  display: flex;
}
.file-icon.default {
  padding: 1rem 0.75rem 0.5rem;
  background-color: rgb(51, 144, 236);
  border-radius: 0.375rem;
}

.Message {
  background-color: whitesmoke;
  border-radius: 0.375rem;
  padding: 0.5rem;
}

.Message.own {
  background-color: rgb(238, 255, 222);
}

.MessageMeta {
  right: 0;
  display: flex;
  align-items: center;
  border-radius: 0.625rem;
  padding: 0 0.25rem;
  cursor: pointer;
  max-width: 100%;
  user-select: none;
  position: relative;
  top: 0.375rem;
  bottom: auto !important;
  float: right;
  line-height: 1.35;
  height: calc(var(--message-meta-height, 1rem));
  margin-left: 0.4375rem;
  margin-right: -0.5rem;
  color: rgba(79, 174, 78, 1);
}

.File .file-icon {
  width: 3.375rem;
  height: 3.375rem;
  margin-inline-end: 0.75rem;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>