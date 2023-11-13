<script setup>
import GuestLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({ error: Object });
</script>
<template>
    <GuestLayout>
        <div class="flex justify-center min-h-screen w-screen mt-16 bg-gray-100 rounded-2xl">
            <div class="flex w-full my-8 px-4 py-4 mx-4 bg-gray-100">
                <div class="w-full flex justify-center h-96 rounded-2xl py-4 m-auto bg-white">
                    <div class="text-center m-auto px-4 py-4 rounded-xl">
                        <h1 class="text-2xl font-bold py-4">401! Not Authorized</h1>
                        <h1>{{ error.details }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
