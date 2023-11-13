<script setup>
// import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from "@inertiajs/vue3";
import PageHeader from "@/Components/PageHeader.vue";

const links = [
    { name: "Home", path: "/" },
    { name: "Login", path: "/login" },
    { name: "Register", path: "/register" },
];
</script>

<template>
    <div
        class="mt-12 h-screen w-screen flex flex-col justify-center align-center items-center bg-slate-100"
    >
        <PageHeader :links="links" />

        <slot />
    </div>
</template>
