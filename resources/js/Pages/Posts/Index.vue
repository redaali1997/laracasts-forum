<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import Container from '@/Components/Container.vue';

defineProps(['posts'])
</script>

<template>
    <AppLayout>
        <Container>
            <ul>
                <li v-for="post in posts.data" :key="post.id" v-text="post.title"></li>
            </ul>
            <Pagination :meta="posts.meta"/>
        </Container>
    </AppLayout>
</template>
