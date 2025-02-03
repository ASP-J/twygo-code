<template>
  <div>
    <Header />
    <div class="p-2 pt-[100px] flex justify-center ">
      <div class="max-w-7xl w-full px-10">
        <slot />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Header from '~/components/shared/Header.vue'
</script>