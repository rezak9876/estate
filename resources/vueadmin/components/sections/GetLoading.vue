<template>
  <div
    class="card bg-warning text-center position-absolute"
    style="
      width: 18rem;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1;
    "
  >
    <div class="card-body">
      <h5 class="card-title">در حال پردازش...</h5>
      <p class="card-text">
        <span
          class="spinner-border spinner-border-sm"
          role="status"
          aria-hidden="true"
        ></span>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "GetLoading",
};
</script>

<style>
</style>