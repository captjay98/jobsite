<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SideBar from "@/Components/SideBar.vue";
import { Head } from "@inertiajs/vue3";

const links = [
    { name: "Home", path: "/", url: "" },
    { name: "About", path: "/about", url: "" },
    { name: "Account", path: "/dashboard", url: "" },
];

const sideLinks = [
    {
        name: "DashBoard",
        path: route("seeker.dashboard"),
        img: "/storage/icons/dashboard.svg",
        url: "/seeker/dashboard",
    },
    {
        name: "Profile",
        path: route("seeker.profile"),
        img: "/storage/icons/profile.svg",
        url: "/seeker/profile",
    },
    {
        name: "Jobs",
        path: route("seeker.jobs.all"),
        img: "/storage/icons/jobs3.png",
        url: "/seeker/jobs",
    },
    {
        name: "Applications",
        path: route("seeker.applications.all"),
        img: "/storage/icons/jobs2.png",
        url: "/seeker/applications",
    },
];
</script>
<template>
    <Head title="Seeker " />

    <AuthenticatedLayout :links="links">
        <SideBar :sideLinks="sideLinks" />
        <div class="min-h-screen h-auto w-screen mt-8 bg-slate-100 rounded-2xl">
            <div class="ml-[11%] my-8 px-1 py-2 mx-4 w-[88%] bg-slate-100">
                <div class="bg-slate-100 my-2 w-full px-1 py-1 rounded-md">
                    <slot />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
