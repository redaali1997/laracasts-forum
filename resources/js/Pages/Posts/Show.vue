<script setup>
import Pagination from '@/Components/Pagination.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps(['post', 'comments'])
</script>

<template>
    <AppLayout>
        <div class="m-10">
            <h1 v-text="post.title" class="text-2xl font-bold"></h1>
            <span class="block text-gray-600 text-sm">About {{ post.created_at }} by: {{ post.user.name }}</span>
            <pre><p v-text="post.body" class="mt-4 font-sans whitespace-pre-wrap"></p></pre>

            <div class="mt-10">
                <h2 class="text-lg font-bold">Comments</h2>
                <ul class="divide-y-2">
                    <li v-for="comment in comments.data" :key="comment.id" class="py-3 flex space-x-2 items-center">
                        <img :src="comment.user.profile_photo_url" class="w-12 h-12 rounded-full">
                        <div>
                            <span v-text="comment.body" class="text-md"></span>
                            <span class="block text-gray-600 text-xs">About {{ comment.created_at }} by: {{ comment.user.name }}</span>
                        </div>
                    </li>
                </ul>
                <Pagination :meta="comments.meta" />
            </div>
        </div>
    </AppLayout>
</template>
