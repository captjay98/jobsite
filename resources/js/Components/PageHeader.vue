<script setup>
import NavBar from "@/Components/NavBar.vue";

defineProps({
    links: Array,
});
</script>

<template>
    <header
        class="w-screen h-12 tracking-wide"
        :class="{
            ' text-slate-200': $page.url === '/',
            'bg-blue-500 text-slate-200 fixed top-0 ': $page.url !== '/',
        }"
    >
        <div class="flex justify-between py-3 px-8 m-auto w-screen">
            <h1 class="text-lg font-bold">JobSite</h1>
            <!-- {{ console.log(seeker.user.email) }} -->
            <NavBar :links="links" />
        </div>
    </header>
</template>
