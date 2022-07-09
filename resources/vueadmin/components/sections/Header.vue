<template>
  <div class="d-flex justify-content-between align-items-center container my-5">
    <div>
      {{ headerInfo.title }}
    </div>
    <div v-if="headerInfo.permission.value !== 'settings'">
    <router-link
      v-if="headerInfo.permission.arg != 'create'"
      :to="headerInfo.button.link"
      :class="headerInfo.button.color"
    >
      <i :class="headerInfo.button.icon"></i>
      {{ headerInfo.button.title }}
    </router-link>

    <router-link
      v-else-if="headerInfo.module == 'estates'"
      :to="headerInfo.button.link"
      :class="headerInfo.button.color"
    >
      <i :class="headerInfo.button.icon"></i>
      {{ headerInfo.button.title }}
    </router-link>

    <router-link
      v-else
      v-can:create="headerInfo.permission.value"
      :to="headerInfo.button.link"
      :class="headerInfo.button.color"
    >
      <i :class="headerInfo.button.icon"></i>
      {{ headerInfo.button.title }}
    </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "Header",
  props: {
    headerInfo: Object,
  },
  setup(props) {},
};
</script>

<style>
</style>