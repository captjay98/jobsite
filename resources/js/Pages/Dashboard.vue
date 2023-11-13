<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const links = [
    { name: "Home", path: "/", url: "" },
    { name: "About", path: "/about", url: "" },
    // { name: "Account", path: "/dashboard", url: "" },
];
</script>
<template>
    <AuthenticatedLayout :links="links">
        <div class="h-screen bg-gray-200">
            <h1 class="text-3xl text-center py-16">This is the Main DashBoard</h1>
        </div>
    </AuthenticatedLayout>
</template>
