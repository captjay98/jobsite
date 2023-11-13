<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SideBar from "@/Components/SideBar.vue";

const links = [
    { name: "Home", path: "/", url: "" },
    { name: "About", path: "/about", url: "" },
    { name: "Account", path: route("admin.dashboard"), url: "" },
];

const sideLinks = [
    {
        name: "DashBoard",
        path: route("admin.dashboard"),
        img: "/storage/icons/dashboard.svg",
        url: "/admin/dashboard",
    },
    {
        name: "Users",
        path: route("admin.users.all"),
        img: "/storage/icons/profile.svg",
        url: "/admin/users",
    },
    {
        name: "Seekers",
        path: route("admin.seekers.all"),
        img: "/storage/icons/profile.svg",
        url: "/admin/seekers",
    },
    {
        name: "Employers",
        path: route("admin.employers.all"),
        img: "/storage/icons/profile.svg",
        url: "/admin/employer",
    },

    {
        name: "Jobs",
        path: route("admin.jobs.all"),
        img: "/storage/icons/jobs2.png",
        url: "/admin/jobs",
    },
    {
        name: "Applications",
        path: route("admin.applications.all"),
        img: "/storage/icons/jobs3.png",
        url: "/admin/applications",
    },
];
</script>
<template>
    <AuthenticatedLayout :links="links">
        <SideBar :sideLinks="sideLinks" />

        <div class="h-auto w-screen bg-gray-100 mt-12 rounded-md">
            <div class="ml-[11%] mb-4 px-4 py-4 mx-4 w-[88%] rounded-md">
                <div class="bg-gray-100 my-2 w-full px-1 py-1 rounded-md">
                    <slot />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
