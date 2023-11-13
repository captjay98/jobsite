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

const tUsers = [];
</script>

<template>
    <AdminLayout>
        <!-- {{ console.log(Object.values(users) }} -->
        <!-- {{ console.log(Object.keys(users) }} -->
        <div class="shadow-sm w-full rounded-xl px-1 py-4 flex flex-wrap justify-evenly">
            <div class="px-1 py-1 w-56 h-24 my-4 m-auto bg-gray-100 rounded-lg">
                <div
                    class="px- py-1 h-full w-full flex justify-between bg-gray-100 rounded-lg shadow-lg"
                >
                    <div class="w-2/5 px-3 py-2 rounded-lg">
                        <div
                            class="w-full h-full bg-blue-300 flex justify-center px-4 py-4 rounded-lg"
                        >
                            <img :src="'/storage/icons/applicants.png'" alt="" />
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
                            <img :src="'/storage/icons/jobs.png'" alt="" />
                        </div>
                    </div>
                    <div class="w-7/12 py-4 px-1 bg-gray-100 rounded-lg">
                        <p class="py-1 text-left font-semibold">{{ seekers.length }}</p>
                        <p class="text-sm text-left">Total Seekers</p>
                    </div>
                </div>
            </div>
            <div class="px-1 py-1 w-56 h-28 my-4 m-auto bg-gray-100 rounded-lg">
                <div
                    class="px-1 py-1 h-full w-full flex justify-between bg-gray-100 rounded-lg shadow-lg"
                >
                    <div class="w-2/5 px-3 py-3 rounded-lg">
                        <div
                            class="w-full h-full bg-blue-300 flex justify-center px-3 py-4 rounded-lg"
                        >
                            <img :src="'/storage/icons/jobs2.png'" alt="" />
                        </div>
                    </div>
                    <div class="w-7/12 py-4 px-1 bg-gray-100 rounded-lg">
                        <p class="py-1 text-left font-semibold">{{ employers.length }}</p>
                        <p class="py-1 text-sm text-left">Total Employers</p>
                    </div>
                </div>
            </div>
            <div class="px-1 py-1 w-56 h-28 my-4 m-auto bg-gray-100 rounded-lg">
                <div
                    class="px-1 py-1 h-full w-full flex justify-between bg-gray-100 rounded-lg shadow-lg"
                >
                    <div class="w-2/5 px-3 py-3 rounded-lg">
                        <div
                            class="w-full h-full bg-blue-300 flex justify-center px-3 py-4 rounded-lg"
                        >
                            <img :src="'/storage/icons/jobs2.png'" alt="" />
                        </div>
                    </div>
                    <div class="w-7/12 py-4 px-1 bg-gray-100 rounded-lg">
                        <p class="py-1 text-left font-semibold">{{ jobs.length }}</p>
                        <p class="py-1 text-sm text-left">Total Jobs</p>
                    </div>
                </div>
            </div>
            <div class="px-1 py-1 w-56 h-28 my-4 m-auto bg-gray-100 rounded-lg">
                <div
                    class="px-1 py-1 h-full w-full flex justify-between bg-gray-100 rounded-lg shadow-lg"
                >
                    <div class="w-2/5 px-3 py-3 rounded-lg">
                        <div
                            class="w-full h-full bg-blue-300 flex justify-center px-3 py-4 rounded-lg"
                        >
                            <img :src="'/storage/icons/jobs2.png'" alt="" />
                        </div>
                    </div>
                    <div class="w-7/12 py-4 px-1 bg-gray-100 rounded-lg">
                        <p class="py-1 text-left font-semibold">{{ applications.length }}</p>
                        <p class="py-1 text-sm text-left">Total Applications</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="min-h-screen bg-white">
            <div class="px-4 py-4 flex flex-wrap space-x-5 justify-center">
                <div class="ml-5 bg-slate-100 my-4 w-96 border-black border-2 rounded-md">
                    <h3 class="-center font-semibold text-xl px-2 py-2 text-left">Users</h3>
                    <table class="bg-slate-100 divide-black divide--2 divide-y-2 w-full">
                        <thead class="bg-white-100 w-full">
                            <tr class="text-left px-2 py-2">
                                <th class="px-2 py-2">Title</th>
                                <th class="px-2 py-2">Date Added</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-black">
                            <tr v-for="user in users">
                                <td class="px-2 py-2">{{ user.firstname }}</td>
                                <td class="px-2 py-2">{{ user.email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bg-slate-100 my-4 w-96 border-black border-2 rounded-md">
                    <h3 class="-center font-semibold text-xl px-2 py-2 text-left">Jobs</h3>
                    <table class="bg-slate-100 divide-black divide--2 divide-y-2 w-full">
                        <thead class="bg-white-100 w-full">
                            <tr class="text-left px-2 py-2">
                                <th class="px-2 py-2">Title</th>
                                <th class="px-2 py-2">Date Added</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-black">
                            <tr v-for="job in jobs">
                                <td class="px-2 py-2">{{ job.title }}</td>
                                <td class="px-2 py-2">{{ job.created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bg-slate-100 my-4 w-96 border-black border-2 rounded-md">
                    <h3 class="-center font-semibold text-xl px-2 py-2 text-left">Applications</h3>
                    <table class="bg-slate-100 divide-black divide--2 divide-y-2 w-full">
                        <thead class="bg-white-100 w-full">
                            <tr class="text-left px-2 py-2">
                                <th class="px-2 py-2">Applicant/Job</th>
                                <th class="px-2 py-2">Application Date</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-black">
                            <!-- <Link> -->
                            <tr v-for="application in applications">
                                <td class="px-2 py-2">
                                    {{ application.seeker.user.firstname }}/{{
                                        application.job.title
                                    }}
                                </td>
                                <td class="px-2 py-2">{{ application.created_at }}</td>
                            </tr>
                            <!-- </Link> -->
                        </tbody>
                    </table>
                </div>
                <div class="bg-slate-100 my-4 w-96 border-black border-2 rounded-md">
                    <h3 class="-center font-semibold text-xl px-2 py-2 text-left">Seekers</h3>
                    <table class="bg-slate-100 divide-black divide--2 divide-y-2 w-full">
                        <thead class="bg-white-100 w-full">
                            <tr class="text-left px-2 py-2">
                                <th class="px-2 py-2">Title</th>
                                <th class="px-2 py-2">Date Added</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-black">
                            <tr v-for="seeker in seekers">
                                <td class="px-2 py-2">{{ seeker.user.username }}</td>
                                <td class="px-2 py-2">{{ seeker.user.email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bg-slate-100 my-4 w-96 border-black border-2 rounded-md">
                    <h3 class="-center font-semibold text-xl px-2 py-2 text-left">Employers</h3>
                    <table class="bg-slate-100 divide-black divide--2 divide-y-2 w-full">
                        <thead class="bg-white-100 w-full">
                            <tr class="text-left px-2 py-2">
                                <th class="px-2 py-2">Title</th>
                                <th class="px-2 py-2">Date Added</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-black">
                            <tr v-for="employer in employers">
                                <td class="px-2 py-2">{{ employer.user.username }}</td>
                                <td class="px-2 py-2">{{ employer.user.email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bg-slate-100 my-4 w-96 h-72">Recent Activities</div>
            </div>
        </div>
    </AdminLayout>
</template>
