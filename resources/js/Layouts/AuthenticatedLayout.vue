<script setup>
import PageHeader from "@/Components/PageHeader.vue";
import PageFooter from "@/Components/PageFooter.vue";

const data = defineProps({
    links: Array,
});
</script>

<template>
    <PageHeader :links="links" />
    <div><slot /></div>
    <PageFooter />
</template>
