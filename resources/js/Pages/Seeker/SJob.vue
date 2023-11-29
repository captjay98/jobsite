<script setup>
import SeekerLayout from "@/Layouts/SeekerLayout.vue";
import OneJob from "@/Components/OneJob.vue";

const { job } = defineProps({
    job: Object,
});
</script>
<template>
    <SeekerLayout>
        <OneJob :job="job" />
    </SeekerLayout>
</template>
