<script setup>
import Card from './Card.vue';

const cards = [];

</script>

<template>
  <header class="block w-full">
    <h2 class="mb-4 pb-1 border-b-[1px] border-border text-lg font-serif font-medium text-gray-900">File Library
    </h2>
  </header>

  <div class="overflow-hidden grid gap-4 grid-cols-[repeat(auto-fill,minmax(155px,1fr))]">
    <Card/>
    <Card/>
    <Card/>
    <Card/>
    <Card/>
    <Card/>
    <Card/>
    <Card/>
    <Card/>
  </div>
</template>