<template>
  <div class="card w-full bg-secondary shadow-lg relative hover-zoom animate-fadeIn">
    <figure class="h-44 border-b shadow overflow-hidden">
      <div
          v-if="item?.image_url"
          :style="{ backgroundImage: `url(${item.image_url})` }"
          class="bg-cover bg-center w-full h-full"
      ></div>
      <img
          v-else
          src="/logo.png"
          class="h-6 opacity-60"
          alt="Imagem do vídeo"
      >
      <div class="dropdown absolute top-2 right-2">
        <button class="btn btn-sm btn-circle" @click="toggleDropdown">
          <Icon name="material-symbols:settings" class="cursor-pointer" />
        </button>
        <ul v-if="dropdownOpen" class="dropdown-menu fade-in">
          <li @click="$emit('edit', item)" class="flex items-center">
            <Icon name="material-symbols:edit" class="text-warning cursor-pointer mr-2" />
            Editar
          </li>
          <li @click="$emit('delete', item)" class="flex items-center">
            <Icon name="material-symbols:delete" class="text-error cursor-pointer mr-2" />
            Excluir
          </li>
        </ul>
      </div>
    </figure>
    <div class="card-body p-4">
      <h2 class="text-ellipsis overflow-hidden h-8 text-xl w-full font-sans text-center font-semibold" :title="item?.title">
        {{ item?.title }}
      </h2>
      <p class="text-ellipsis overflow-hidden h-16 text-sm text-center" :title="item?.description">
        {{ item?.description }}
      </p>
      <div class="w-full flex">
        <button
            class="btn btn-primary grow"
            :disabled="!item?.video_url"
            @click="$emit('show', item)"
        >
          Assistir
        </button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { GetVideoData } from '~/services/api/video/GetVideoData';

const dropdownOpen = ref(false);

const toggleDropdown = () => {
  dropdownOpen.value = !dropdownOpen.value;
};

defineProps({
  item: {
    type: GetVideoData,
    required: true,
  },
});

defineEmits(['edit', 'show', 'delete']);
</script>

<style scoped>
.hover-zoom:hover .bg-cover {
  transform: scale(1.1);
}

.bg-cover {
  background-size: cover;
  background-position: center;
  transition: transform 0.3s ease;
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  right: 0;
  background-color: white;
  border: 1px solid #ccc;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  z-index: 1;
  border-radius: 8px;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.fade-in {
  opacity: 1;
}

.dropdown-menu li {
  padding: 20px 20px;
  cursor: pointer;
}

.dropdown-menu li:hover {
  background-color: #f0f0f0;
  border-radius: 8px;
}
</style>