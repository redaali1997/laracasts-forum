<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps(['posts'])
</script>

<template>
<AppLayout>
    <ul>
        <li v-for="post in posts" :key="post.id" v-text="post.title"></li>
    </ul>
</AppLayout>
</template>

