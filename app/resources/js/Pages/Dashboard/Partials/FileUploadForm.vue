<script setup>
import CheckIcon from '@/Components/CheckIcon.vue';
import FindFileIcon from '@/Components/FindFileIcon.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputError from '@/Components/InputError.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
  fileName: null,
  file: null,
});

let isDragging = ref(false);
let uploadReady = ref(false);
let uploadComplete = ref(false);
let uploadText = ref('Drag and drop the image files to here or click here.');

// const submit = () => {
//   form.post(route('uploads.store'), {
//     onFinish: () => console.log('finish')
//   });
// };

function resetUploadText() {
  uploadText.value = 'Drag and drop the image files to here or click here.';
}

// Upload form submission
function submit() {
  form.post('/uploads/store');
  uploadReady.value = false;
  isDragging.value = false;
  uploadComplete.value = true;
  uploadText.value = 'Your file has been uploaded';
  setTimeout(() => {
    uploadComplete.value = false;
    resetUploadText();
  }, 2000);
}

// File selected within the browser file explorer
function onSelected(e) {
  form.file = e.target.files[0];
  form.fileName = e.target.files[0].name;
  uploadText.value = form.fileName;
  uploadReady.value = true;
}

// File dropped onto the page from the os file explorer
function onDrop(e) {
  form.file = e.dataTransfer.files[0];
  form.fileName = e.dataTransfer.files[0].name;
  uploadText.value = form.fileName;
  isDragging.value = false;
  uploadReady.value = true;
}

// Deals with image upload dragging UI changes
function dragover() {
  isDragging.value = true;
  uploadText.value = 'Drop your files here';
}
function dragleave() {
  isDragging.value = false;
  resetUploadText();
}

</script>

<template>

  <header class="block w-full">
    <h2 class="mb-4 pb-1 border-b-[1px] border-border text-lg font-serif font-medium text-gray-900">Select a File
    </h2>
  </header>

  <form @submit.prevent="submit" enctype="multipart/form-data" class="flex flex-col">

    <label for="uploadFile" @dragover.prevent="dragover" @dragleave.prevent="dragleave" @drop.prevent="onDrop"
      :class="[isDragging || uploadReady ? 'border-primary-color' : 'border-primary-light']"
      class="cursor-pointer flex items-center flex-auto p-2 h-16 border-2 border-dashed">

      <div class="h-full">
        <FindFileIcon />
      </div>

      <div class="ml-4 text-sm text-gray-600">
        <span :key="uploadText" v-html="uploadText"></span>
      </div>

      <!-- <progress v-if="form.progress" :value="fromJSON.progress.percentage" max="100">
        {{ from.progress.percentage }}%
      </progress> -->

      <div v-if="uploadComplete" class="flex justify-end flex-auto mr-2 h-7">
        <div>
          <CheckIcon />
        </div>
      </div>

    </label>
    <input type="file" name="Upload file" id="uploadFile" @input="onSelected" hidden />

    <!-- Fix required -->
    <InputError class="mt-2" :message="form.errors.uploadFile" />

    <div class="flex justify-end items-center mt-4">
      <PrimaryButton type="submit" :class="{ 'opacity-25': !uploadReady }" :disabled="!uploadReady">
        Upload
      </PrimaryButton>
    </div>
  </form>
</template>