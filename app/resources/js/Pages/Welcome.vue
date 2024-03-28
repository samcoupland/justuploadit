<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
});
</script>

<template>

  <Head title="Welcome" />
  <div class="bg-white h-screen flex flex-col justify-center items-center">
    <header class="fixed top-0 p-4">
      <!-- dark mode toggle -->
    </header>
    <main class="fixed pb-8">
      <section class="text-center">
        <h1 tabindex="1" class="text-6xl font-serif mb-8">
          JustUploadIt
        </h1>
        <div v-if="canLogin" class="flex flex-col justify-center items-center space-y-4">
          <div class="flex">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
              class="uppercase border-2 border-primary-color bg-primary-color mx-5 w-36 py-2 text-white  transition-colors duration-500 ease-in-out hover:bg-primary-dark hover:border-primary-light">
            Upload
            </Link>

            <template v-else>
              <Link :href="route('login')"
                class="uppercase border-2 border-primary-color bg-primary-color mx-5 w-36 py-2 text-white  transition-colors duration-500 ease-in-out hover:bg-primary-dark hover:border-primary-dark">
              Log in
              </Link>

              <Link v-if="canRegister" :href="route('register')"
                class="uppercase border-2 border-primary-color mx-5 w-36 py-2 text-primary-color transition-colors duration-500 ease-in-out hover:text-white hover:bg-primary-color hover:border-primary-color">
              Register
              </Link>
            </template>
          </div>
        </div>
      </section>
    </main>
    <footer class="fixed bottom-0 pb-8">
      © Sam Coupland
    </footer>
  </div>
</template>
