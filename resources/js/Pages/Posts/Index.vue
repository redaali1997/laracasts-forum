<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import Container from '@/Components/Container.vue';
import { Link } from '@inertiajs/vue3'

defineProps(['posts'])
</script>

<template>
    <AppLayout>
        <Container>
            <ul class="divide-y-2">
                <li v-for="post in posts.data" :key="post.id" class="py-3 group">
                    <Link :href="route('posts.show', post.id)">
                    <span v-text="post.title" class="text-lg font-bold group-hover:text-indigo-600"></span>
                    <span class="block text-gray-600 text-sm">About {{ post.created_at }} by: {{ post.user.name }}</span>
                    </Link>
                </li>
            </ul>
            <Pagination :meta="posts.meta" />
        </Container>
    </AppLayout>
</template>
