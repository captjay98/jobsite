<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SideBar from "@/Components/SideBar.vue";

const links = [
    { name: "Home", path: "/", url: "" },
    { name: "About", path: "/about", url: "" },
    { name: "Account", path: route("employer.dashboard"), url: "" },
];

const sideLinks = [
    {
        name: "DashBoard",
        path: route("employer.dashboard"),
        img: "/storage/icons/dashboard.svg",
        url: "/employer/dashboard",
    },
    {
        name: "Profile",
        path: route("employer.profile"),
        img: "/storage/icons/profile.svg",
        url: "/employer/profile",
    },
    {
        name: "Jobs",
        path: route("employer.jobs.all"),
        img: "/storage/icons/jobs2.png",
        url: "/employer/jobs",
    },
    {
        name: "Applications",
        path: route("employer.applications.all"),
        img: "/storage/icons/jobs3.png",
        url: "/employer/applications",
    },
];
</script>
<template>
    <AuthenticatedLayout :links="links">
        <SideBar :sideLinks="sideLinks" />

        <div class="min-h-screen max-w-screen bg-gray-100 mt-6 rounded-md">
            <div class="ml-[12%] mb-4 px-1 py-2 mx-1 w-[88%] rounded-md">
                <div class="bg-gray-100 my-1 w-full px-1 py-1 rounded-md">
                    <slot />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
