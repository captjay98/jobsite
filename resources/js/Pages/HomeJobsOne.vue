<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import OneJob from "@/Components/OneJob.vue";

const { job } = defineProps({
    job: Object,
});
</script>
<template>
    <GuestLayout>
        <OneJob :job="job" />
    </GuestLayout>
</template>
