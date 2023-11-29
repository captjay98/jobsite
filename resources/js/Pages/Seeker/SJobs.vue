<script setup>
import SeekerLayout from "@/Layouts/SeekerLayout.vue";
import AllJobs from "@/Components/AllJobs.vue";

const { jobs } = defineProps({
    jobs: Object,
});
</script>
<template>
    <SeekerLayout>
        <AllJobs :jobs="jobs" />
    </SeekerLayout>
</template>
