<script setup>
import NavBar from "@/Components/NavBar.vue";

defineProps({
    links: Array,
});
</script>

<template>
    <header
        class="h-12 w-screen fixed top-0 tracking-wide"
        :class="{
            'bg-slate-100 text-slate-700': $page.url === '/',
            'bg-blue-500 text-slate-200': $page.url !== '/',
        }"
    >
        <div class="flex justify-between w-screen m-auto px-8 py-3">
            <h1 class="font-bold text-lg">JobSite</h1>
            <!-- {{ console.log(seeker.user.email) }} -->
            <NavBar :links="links" />
        </div>
    </header>
</template>
