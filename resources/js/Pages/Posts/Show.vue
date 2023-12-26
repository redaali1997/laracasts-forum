<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps(['post'])
</script>

<template>
    <AppLayout>
        <div class="m-10">
            <h1 v-text="post.title" class="text-2xl font-bold"></h1>
            <span class="block text-gray-600 text-sm">About {{ post.created_at }} by: {{ post.user.name }}</span>
            <pre><p v-text="post.body" class="mt-4 font-sans whitespace-pre-wrap"></p></pre>
        </div>
    </AppLayout>
</template>
