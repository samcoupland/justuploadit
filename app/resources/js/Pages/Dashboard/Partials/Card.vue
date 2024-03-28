<script setup>
import DeleteIcon from '@/Components/DeleteIcon.vue';
import { ref } from 'vue';

const props = defineProps({
  image: {
    default: false
  }
})

const hover = ref(false)

</script>

<template>

  <div @mouseover="hover = true" @mouseleave="hover = false" class="group relative flex justify-end h-30 w-40">
    <div :class="{ 'opacity-50 transition ease-in-out': hover }">
      <img v-if="image">
      <img v-else src="img/placeholder.webp" alt="Template Picture">
    </div>
    <div v-show="hover" @click="console.log('DELETED')" class="z-100 absolute m-1 ml-0 h-7 w-7">
      <DeleteIcon class="fill-main-dark transition ease-in-out duration-150 hover:fill-primary-dark cursor-pointer" />
    </div>
  </div>
</template>