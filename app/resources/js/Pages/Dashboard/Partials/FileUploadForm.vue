<script setup>
import CheckIcon from '@/Components/CheckIcon.vue';
import FindFileIcon from '@/Components/FindFileIcon.vue';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = useForm({
  name: null,
  avatar: null,
})

function submit() {
  form.post('/users')
}

const uploadReady = false

</script>
<template>

  <header class="block w-full">
    <h2 class="mb-4 pb-1 border-b-[1px] border-border text-lg font-serif font-medium text-gray-900">Select a File
    </h2>
  </header>

  <div class="flex flex-col">
    <div class="flex items-center flex-auto">
      <form @click="console.log('PICK A FILE')"
        class=" cursor-pointer flex items-center flex-auto p-2 h-16 border-primary-color border-2 border-dashed"
        @submit.prevent="submit">
        <!-- <Link :href="route('upload')"> -->
        <input class="file-input" type="file" name="file" ref="fileInput" hidden />
        <div class="h-full">
          <FindFileIcon />
        </div>
        <p class="flex justify-start flex-auto ml-4 text-sm text-gray-600">
          <span>Drag and drop the image files to here or click here.</span>
        </p>
        <!-- </Link> -->
      </form>
      <!-- <div class="flex items-center h-6 w-6">
            <CheckIcon />
      </div> -->
    </div>
    <div class="flex justify-end mt-4">
      <PrimaryButton @click="console.log('UPLOAD')" :class="{ 'opacity-25': !uploadReady }" :disabled="!uploadReady">
        Upload
      </PrimaryButton>
    </div>
  </div>

</template>