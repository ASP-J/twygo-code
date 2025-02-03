<template>
  <div class="flex justify-center align-center">
    <div class="z-10 h-20 px-8 border-b-2 border-primary bg-base-100 shadow fixed d-flex flex justify-between items-center m-4 w-[90%] md:w-[80%] rounded-lg">      <div class="cursor-pointer" @click="navigateTo('/')">
        <img src="/logo.png" class="h-6 object-cover" alt="logo">
      </div>
      <div>
        <button class="btn" @click="navigateTo('/metrics')">
          Métricas
        </button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
const navigateTo = (path: string) => {
  useRouter().push(path)
}
</script>