<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import FileUploadForm from './Partials/FileUploadForm.vue';
import FileLibrary from './Partials/FileLibrary.vue';

</script>

<template>

  <Head title="Upload" />

  <AuthenticatedLayout>
    <!-- Upload bar -->
    <div class="pt-2">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-primary-color">
          <FileUploadForm />
        </div>
      </div>
    </div>

    <!-- Library -->
    <div class="pt-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-primary-color">
          <FileLibrary />
        </div>
      </div>
    </div>

  </AuthenticatedLayout>
</template>
