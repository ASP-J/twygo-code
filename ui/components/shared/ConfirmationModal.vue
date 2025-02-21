<template>
  <Modal v-if="show" :show="show" @close="cancel">
    <div class="md:w-[500px] p-3">
      <h3 class="text-xl text-center font-bold uppercase">
        {{ title }}
      </h3>
      <div class="text-center my-2">
        {{ message }}
      </div>
      <div class="flex gap-1 justify-between mt-6">
        <button class="btn btn-ghost" :disabled="loading" @click="cancel">
          {{ cancelButtonMessage }}
        </button>
        <button
          class="btn"
          :class="dialogClasses.button"
          :disabled="loading"
          @click="confirm"
        >
          {{ confirmButtonMessage }}
        </button>
      </div>
    </div>
  </Modal>
</template>

<script>
import { ref } from 'vue'
import Modal from '~/components/shared/Modal.vue';

export default {
  components: {Modal},
  props: {
    title: {
      type: String,
      default: 'Confirmar',
    },
    message: {
      type: String,
      default: '',
    },
    confirmButtonMessage: {
      type: String,
      default: 'Confirmar',
    },
    cancelButtonMessage: {
      type: String,
      default: 'Cancelar',
    },
    type: {
      type: String,
      default: 'delete',
    },
    loading: {
      type: Boolean,
      default: false,
    },
  },
  emits: ['confirm', 'cancel'],
  setup(props, { emit }) {
    const show = ref(true)

    const confirm = () => {
      emit('confirm')
      show.value = false
    }

    const cancel = () => {
      show.value = false
      emit('cancel')
    }

    return {
      show,
      confirm,
      cancel,
    }
  },
  computed: {
    dialogClasses () {
      switch (this.type) {
        case 'confirm':
          return {
            button: 'btn-success',
            color: 'text-success',
          }
        case 'delete':
          return {
            button: 'btn-error',
            color: 'text-error',
          }
        case 'warning':
          return {
            button: 'btn-warning',
            color: 'text-warning',
          }
        default:
          return {
            button: 'btn-primary',
            color: 'text-primary',
          }
      }
    },
  },
}
</script>
