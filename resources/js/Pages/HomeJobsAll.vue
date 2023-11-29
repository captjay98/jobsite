<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import AllJobs from "@/Components/AllJobs.vue";

const { jobs } = defineProps({
    jobs: Object,
});
</script>
<template>
    <GuestLayout>
        <div class="flex justify-center items-center" v-show="jobs.length < 1">
            <h1 class="text-xl font-semibold">Sorry! No jobs matching the search criteria.</h1>
        </div>

        <AllJobs :jobs="jobs" />
    </GuestLayout>
</template>
