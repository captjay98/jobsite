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
        <div class="min-h-screen w-full bg-gray-100 mt-6 rounded-md">
            <div class="ml-[12%] mb-4 px-1 py-2 w-[88%] rounded-md">
                <div class="bg-gray-100 my-1 w-full px- py-1 rounded-md">
                    <slot />
                </div>
            </div>
        </div>

        <SideBar :sideLinks="sideLinks" />
    </AuthenticatedLayout>
</template>
