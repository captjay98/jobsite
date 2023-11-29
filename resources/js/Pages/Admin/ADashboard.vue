<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";

const { admin, users, jobs, applications, seekers, employers } = defineProps({
    admin: Object,
    users: Object,
    jobs: Object,
    applications: Object,
    seekers: Object,
    employers: Object,
});
</script>

<template>
    <AdminLayout>
        <div class="shadow-sm w-full rounded-xl px-1 py-4 flex flex-wrap justify-evenly">
            <div class="px-1 py-1 w-56 h-24 my-4 m-auto bg-gray-100 rounded-lg">
                <div
                    class="px- py-1 h-full w-full flex justify-between bg-gray-100 rounded-lg shadow-lg"
                >
                    <div class="w-2/5 px-3 py-2 rounded-lg">
                        <div
                            class="w-full h-full bg-blue-300 flex justify-center px-4 py-4 rounded-lg"
                        >
                            <img :src="'/storage/icons/profile.svg'" alt="" />
                        </div>
                    </div>
                    <div class="w-7/12 py-4 px- bg-gray-100 rounded-lg">
                        <p class="py-1 text-left font-semibold">
                            {{ users.length }}
                        </p>
                        <p class="text-sm text-left">Total Users</p>
                    </div>
                </div>
            </div>
            <div class="px-1 py-1 w-56 h-24 my-4 m-auto bg-gray-100 rounded-lg">
                <div
                    class="px-1 py-1 h-full w-full flex justify-between bg-gray-100 rounded-lg shadow-lg"
                >
                    <div class="w-2/5 px-3 py-2 rounded-lg">
                        <div
                            class="w-full h-full bg-blue-300 flex justify-center px-3 py-4 rounded-lg"
                        >
                            <img :src="'/storage/icons/applicants.png'" alt="" />
                        </div>
                    </div>
                    <div class="w-7/12 py-4 px-1 bg-gray-100 rounded-lg">
                        <p class="py-1 text-left font-semibold">{{ seekers.length }}</p>
                        <p class="text-sm text-left">Total Seekers</p>
                    </div>
                </div>
            </div>
            <div class="px-1 py-1 w-56 h-24 my-4 m-auto bg-gray-100 rounded-lg">
                <div
                    class="px- py-1 h-full w-full flex justify-between bg-gray-100 rounded-lg shadow-lg"
                >
                    <div class="w-2/5 px-3 py-2 rounded-lg">
                        <div
                            class="w-full h-full bg-blue-300 flex justify-center px-4 py-4 rounded-lg"
                        >
                            <img :src="'/storage/icons/jobs3.png'" alt="" />
                        </div>
                    </div>
                    <div class="w-7/12 py-4 px- bg-gray-100 rounded-lg">
                        <p class="py-1 text-left font-semibold">
                            {{ employers.length }}
                        </p>
                        <p class="text-sm text-left">Total Employers</p>
                    </div>
                </div>
            </div>
            <div class="px-1 py-1 w-56 h-24 my-4 m-auto bg-gray-100 rounded-lg">
                <div
                    class="px- py-1 h-full w-full flex justify-between bg-gray-100 rounded-lg shadow-lg"
                >
                    <div class="w-2/5 px-3 py-2 rounded-lg">
                        <div
                            class="w-full h-full bg-blue-300 flex justify-center px-4 py-4 rounded-lg"
                        >
                            <img :src="'/storage/icons/jobs.png'" alt="" />
                        </div>
                    </div>
                    <div class="w-7/12 py-4 px- bg-gray-100 rounded-lg">
                        <p class="py-1 text-left font-semibold">
                            {{ jobs.length }}
                        </p>
                        <p class="text-sm text-left">Total Jobs</p>
                    </div>
                </div>
            </div>
            <div class="px-1 py-1 w-56 h-24 my-4 m-auto bg-gray-100 rounded-lg">
                <div
                    class="px- py-1 h-full w-full flex justify-between bg-gray-100 rounded-lg shadow-lg"
                >
                    <div class="w-2/5 px-3 py-2 rounded-lg">
                        <div
                            class="w-full h-full bg-blue-300 flex justify-center px-4 py-4 rounded-lg"
                        >
                            <img :src="'/storage/icons/jobs2.png'" alt="" />
                        </div>
                    </div>
                    <div class="w-7/12 py-4 px- bg-gray-100 rounded-lg">
                        <p class="py-1 text-left font-semibold">
                            {{ applications.length }}
                        </p>
                        <p class="text-sm text-left">Total Applications</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="min-h-screen -white">
            <div class="px-1 py-1 flex flex-wrap justify-around">
                <div class="my-4 w-[340px]">
                    <h3 class="text-center font-semibold text-xl py-2">Users</h3>
                    <table
                        class="bg-gray-100 my-2 border-inherit shadow-2xl border-2 rounded-md hover:translate-y-2 overflow-auto"
                    >
                        <thead class="bg-white-100 w-full">
                            <tr class="text-left px-2 py-2">
                                <th class="px-3 py-2 text-[14px]">ID</th>
                                <th class="px-2 py-2 text-[14px]">Name</th>
                                <th class="px-2 py-2 text-[14px]">Email</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr v-for="user in users" class="odd:bg-gray-200">
                                <td class="px-3 py-2 text-[14px] font-bold">{{ user.id }}</td>
                                <td class="px-2 py-2 text-[12px] max-w-[150px] truncate">
                                    {{ user.firstname }} {{ user.lastname }}
                                </td>
                                <td class="px-2 py-2 text-[12px] max-w-[150px] truncate">
                                    {{ user.email }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="my-4 w-[340px]">
                    <h3 class="text-center font-semibold text-xl py-2">Jobs</h3>
                    <table
                        class="bg-gray-100 my-2 border-inherit shadow-2xl border-2 rounded-md hover:translate-y-2 overflow-auto"
                    >
                        <thead class="bg-white-100 w-full">
                            <tr class="text-left px-2 py-2">
                                <th class="px-3 py-2 text-[14px]">ID</th>
                                <th class="px-2 py-2 text-[14px]">Title</th>
                                <th class="px-2 py-2 text-[14px]">Date created</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-black">
                            <tr v-for="job in jobs" class="odd:bg-gray-200">
                                <td class="px-3 py-2 text-[14px] font-bold">{{ job.id }}</td>
                                <td class="px-2 py-2 text-[12px] max-w-[150px] truncate">
                                    {{ job.title }}
                                </td>
                                <td class="px-2 py-2 text-[12px] max-w-[150px] truncate">
                                    {{ job.created_at }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="my-4 w-[340px]">
                    <h3 class="text-center font-semibold text-xl py-2">Applications</h3>
                    <table
                        class="bg-gray-100 my-2 w-[340px] border-inherit shadow-2xl border-2 rounded-md hover:translate-y-2 overflow-auto"
                    >
                        <thead class="bg-white-100 w-full">
                            <tr class="text-left px-2 py-2">
                                <th class="px-3 py-2 text-[14px]">ID</th>
                                <th class="px-2 py-2 text-[14px]">Applicant/Job</th>
                                <th class="px-2 py-2 text-[14px]">Date Applied</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-black">
                            <tr v-for="app in applications" class="odd:bg-gray-200">
                                <td class="px-3 py-2 text-[14px] font-bold">{{ app.id }}</td>
                                <td class="px-2 py-2 text-[12px] max-w-[150px] truncate">
                                    {{ app.seeker.user.firstname }}/
                                    {{ app.job.title }}
                                </td>
                                <td class="px-2 py-2 text-[12px] max-w-[150px] truncate">
                                    {{ app.created_at }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="my-4 w-[340px]">
                    <h3 class="text-center font-semibold text-xl py-2">Seekers</h3>
                    <table
                        class="bg-gray-100 my-2 border-inherit shadow-2xl border-2 rounded-md hover:translate-y-2 overflow-auto"
                    >
                        <thead class="bg-white-100 w-full">
                            <tr class="text-left px-2 py-2">
                                <th class="px-3 py-2 text-[14px]">ID</th>
                                <th class="px-2 py-2 text-[14px]">Name</th>
                                <th class="px-2 py-2 text-[14px]">Email</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-black">
                            <tr v-for="seeker in seekers" class="odd:bg-gray-200">
                                <td class="px-3 py-2 text-[14px] font-bold">{{ seeker.id }}</td>
                                <td class="px-2 py-2 text-[12px] max-w-[150px] truncate">
                                    {{ seeker.user.firstname }} {{ seeker.user.lastname }}
                                </td>
                                <td class="px-2 py-2 text-[12px] max-w-[150px] truncate">
                                    {{ seeker.user.email }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="my-4 w-[340px]">
                    <h3 class="text-center font-semibold text-xl py-2">Employers</h3>
                    <table
                        class="bg-gray-100 my-2 border-inherit shadow-2xl border-2 rounded-md hover:translate-y-2 overflow-auto"
                    >
                        <thead class="bg-white-100 w-full">
                            <tr class="text-left px-2 py-2">
                                <th class="px-3 py-2 text-[14px]">ID</th>
                                <th class="px-2 py-2 text-[14px]">Name</th>
                                <th class="px-2 py-2 text-[14px]">Email</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-black">
                            <tr v-for="employer in employers" class="odd:bg-gray-200">
                                <td class="px-3 py-2 text-[14px] font-bold">{{ employer.id }}</td>
                                <td class="px-2 py-2 text-[12px] max-w-[150px] truncate">
                                    {{ employer.user.firstname }} {{ employer.user.lastname }}
                                </td>
                                <td class="px-2 py-2 text-[12px] max-w-[150px] truncate">
                                    {{ employer.user.email }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="my-4 w-[340px]">
                    <h3 class="text-center font-semibold text-xl py-2">Recent Activities</h3>
                    <table
                        class="bg-gray-100 my-2 border-inherit shadow-2xl border-2 rounded-md hover:translate-y-2 overflow-auto"
                    >
                        <thead class="bg-white-100 w-full">
                            <tr class="text-left px-2 py-2">
                                <!-- <th class="px-3 py-2 text-[14px]">ID</th> -->
                                <!-- <th class="px-2 py-2 text-[14px]">Name</th> -->
                                <!-- <th class="px-2 py-2 text-[14px]">Email</th> -->
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-black">
                            <!-- <tr v-for="employer in employers" class="odd:bg-gray-200"> -->
                            <!-- <td class="px-3 py-2 text-[14px] font-bold">{{ employer.id }}</td> -->
                            <!-- <td class="px-2 py-2 text-[12px]"> -->
                            <!-- {{ employer.user.firstname }} {{ employer.user.lastname }} -->
                            <!-- </td> -->
                            <!-- <td class="px-2 py-2 text-[12px]">{{ employer.user.email }}</td> -->
                            <!-- </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
