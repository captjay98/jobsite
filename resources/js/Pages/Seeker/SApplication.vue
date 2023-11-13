<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SeekerLayout from "@/Layouts/SeekerLayout.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { ref } from "vue";

const { application } = defineProps({
    application: Object,
    error: Array,
});

const user = {
    status: ref(application.status),
    firstname: ref(application.seeker.user.firstname),
    lastname: ref(application.seeker.user.lastname),
    username: ref(application.seeker.user.username),
    email: ref(application.seeker.user.email),
    phone: ref(application.seeker.phone),
    dateofbirth: ref(application.seeker.dateofbirth),
    city: ref(application.seeker.city),
    state: ref(application.seeker.state),
    country: ref(application.seeker.country),
    ethnicity: ref(application.seeker.ethnicity),
    qualifications: ref(application.seeker.qualifications),
    experiences: ref(application.seeker.experiences),
    skills: ref(application.seeker.skills),
    cv: ref(application.seeker.cv),
    visa: ref(application.seeker.visa),
    passport: ref(application.seeker.passport),
};

const form = useForm(user);

const qualifications = user.qualifications;
const experiences = user.experiences;
const skills = user.skills;

console.log(application);
</script>
<template>
    <AuthenticatedLayout>
        <SeekerLayout>
            <div class="w-full rounded-2xl py-4 m-auto bg-gray-100">
                <div
                    class="flex justify-between items-center mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-lg"
                >
                    <h1 class="text-xl text-left font-semibold py-4">Application Details</h1>
                    <form action="">
                        <div class="text-sm text-left py-4 px-2">
                            <select
                                class="outline-none ring-0 text-sm flex w- bg-gray-100 border-slate-300 shadow-2xl rounded-xl font-"
                                :class="{
                                    'bg-blue-400': form.status == 'applied',
                                    'bg-yellow-300': form.status == 'reviewing',
                                    'bg-green-400': form.status == 'accepted',
                                    'bg-red-500': form.status == 'rejected',
                                }"
                                id="status"
                                v-model="form.status"
                            >
                                <option value="applied">Applied</option>
                                <option value="reviewing">Reviewing</option>
                                <option value="accepted">Accepted</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div
                    class="w-full flex flex-wrap justify-center bg-white rounded-md px-2 py-2 border-slate-800"
                >
                    <form
                        class="mt-4 w-full m-auto px-1 py-2 rounded-md"
                        @submit.prevent="updateUser"
                    >
                        <div class="flex align-middle justify-center bg-white mb-4 w-full">
                            <h1 class="h-28 w-28 m-auto bg-purple-300 rounded-full">
                                Seeker image
                            </h1>
                        </div>
                        <div class="mx-2 my-4 w-full flex flex-wrap justify-around">
                            <div
                                class="flex flex-wrap mt-8 m-auto justify-center lg:w-[45%] rounded-md"
                            >
                                <div class="m-auto w-[99%] px-4 py-4 bg-white rounded-md">
                                    <h1 class="text-xl text-center font-semibold">
                                        Personal Details
                                    </h1>
                                </div>

                                <div class="text-sm text-left py-4 px-4">
                                    <label for="firstname"
                                        ><span class="text-sm px-2">First Name:</span></label
                                    >
                                    <input
                                        class="flex row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="firstname"
                                        v-model="form.firstname"
                                    />
                                </div>
                                <div class="text-sm text-left py-4 px-4">
                                    <label for="lastname"
                                        ><span class="text-sm px-2">Last Name:</span></label
                                    >
                                    <input
                                        class="flex row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="lastname"
                                        v-model="form.lastname"
                                    />
                                </div>
                                <div class="text-sm text-left py-4 px-4">
                                    <label for="username"
                                        ><span class="text-sm px-2">User Name:</span></label
                                    >
                                    <input
                                        class="flex row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="username"
                                        v-model="form.username"
                                    />
                                </div>

                                <div class="text-sm text-left py-4 px-4">
                                    <label for="email"
                                        ><span class="text-sm px-2">Email:</span></label
                                    >
                                    <input
                                        class="flex row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="email"
                                        v-model="form.email"
                                    />
                                </div>
                                <div class="text-sm text-left py-4 px-4">
                                    <label for="phone"
                                        ><span class="text-sm px-2">Phone:</span></label
                                    >
                                    <input
                                        class="flex row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="phone"
                                        v-model="form.phone"
                                    />
                                </div>
                                <div class="text-sm text-left py-4 px-4">
                                    <label for="dateofbirth"
                                        ><span class="text-sm px-2">DOB:</span></label
                                    >
                                    <input
                                        class="flex row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="dateofbirth"
                                        v-model="form.dateofbirth"
                                    />
                                </div>
                            </div>
                            <div
                                class="flex flex-wrap bg-white mt-8 m-auto justify-center lg:w-[45%] rounded-md"
                            >
                                <div class="m-auto w-[99%] px-4 py-4 bg-white rounded-md">
                                    <h1 class="text-xl text-center font-semibold">Other Details</h1>
                                </div>

                                <div class="text-sm text-left py-4 px-4">
                                    <label for="city"
                                        ><span class="text-sm px-2">City:</span></label
                                    >
                                    <input
                                        class="flex row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="city"
                                        v-model="form.city"
                                    />
                                </div>
                                <div class="text-sm text-left py-4 px-4">
                                    <label for="state"
                                        ><span class="text-sm px-2">State:</span></label
                                    >
                                    <input
                                        class="flex row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="state"
                                        v-model="form.state"
                                    />
                                </div>
                                <div class="text-sm text-left py-4 px-4">
                                    <label for="country"
                                        ><span class="text-sm px-2">Country:</span></label
                                    >
                                    <input
                                        class="flex row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="country"
                                        v-model="form.country"
                                    />
                                </div>

                                <div class="text-sm text-left py-4 px-4">
                                    <label for="ethnicity"
                                        ><span class="text-sm px-2">Ethnicity:</span></label
                                    >
                                    <input
                                        class="flex row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="ethnicity"
                                        v-model="form.ethnicity"
                                    />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div
                    class="w-full bg-white flex flex-wrap justify-center rounded-md my-4 px-1 py-2 border-slate-800"
                >
                    <form class="w-full my-4 rounded-md" @submit.prevent="updateUser">
                        <div class="mx-2 my-4 w-full flex flex-wrap justify-around">
                            <div class="w-[50%] mx-5">
                                <div class="m-auto w-[99%] px-4 py-4 bg-white rounded-md">
                                    <h1 class="text-xl text-center font-semibold">
                                        Qualifications
                                    </h1>
                                </div>

                                <div
                                    v-for="quali in qualifications"
                                    class="flex flex-wrap mt-8 m-auto justify-center lg:w-full rounded-md"
                                >
                                    <div class="text-sm text-left pt-2 px-2">
                                        <input
                                            class="flex w-16 border-slate-200 shadow-sm rounded-md font-semibold"
                                            type="text"
                                            id="from"
                                            v-model="quali.from"
                                        />
                                    </div>
                                    <div class="text-sm text-left pt-2 px-2">
                                        <input
                                            class="flex w-16 border-gray-200 shadow-sm rounded-md font-semibold"
                                            type="text"
                                            id="to"
                                            v-model="quali.to"
                                        />
                                    </div>
                                    <div class="text-sm text-left pt-2 px-2">
                                        <input
                                            class="flex w-28 border-gray-100 shadow-sm rounded-md font-semibold"
                                            type="text"
                                            id="title"
                                            v-model="quali.title"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="w-[50%] mx-5 my-4">
                                <div class="m-auto w-[99%] px-4 py-4 bg-white rounded-md">
                                    <h1 class="text-xl text-center font-semibold">Skills</h1>
                                </div>

                                <div
                                    v-for="skill in skills"
                                    class="flex flex-wrap mt-8 m-auto justify-center rounded-md"
                                >
                                    <div class="text-sm text-left pt-2 px-2">
                                        <input
                                            class="flex w-16 border-slate-200 shadow-sm rounded-md font-semibold"
                                            type="text"
                                            id="from"
                                            v-model="skill.from"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div
                class="w-full flex flex-wrap justify-center bg-white rounded-md my-4 px-2 py-2 border-slate-800"
            >
                <div class="mt-2 m-auto w-[99%] px-4 py-2 bg-white rounded-md">
                    <h1 class="text-xl text-left font-semibold py-2">Experiences</h1>
                </div>

                <div class="mx-1 my-4 lg:w-[80%] bg-white">
                    <form class="my-4 bg-white rounded-md" @submit.prevent="updateUser">
                        <div
                            v-for="expe in experiences"
                            class="flex flex-wrap lg:justify-center mt-2 m-auto space-x-2 max-sm:w-[70%] lg:w-[90%] rounded-md"
                        >
                            <div class="text-sm text-left ml-3 py-2 px-2">
                                <input
                                    class="flex w-44 border-gray-100 shadow-sm rounded-md font-semibold"
                                    type="text"
                                    id="title"
                                    v-model="expe.title"
                                />
                            </div>
                            <div class="flex items-center justify-center max-sm:pl-20">at</div>
                            <div class="text-sm text-left py-2 px-2 max-sm:pr-6">
                                <input
                                    class="flex w-44 border-gray-100 shadow-sm rounded-md font-semibold"
                                    type="text"
                                    id="at"
                                    v-model="expe.at"
                                />
                            </div>
                            <div class="text-sm text-left py-2 px-2">
                                <input
                                    class="flex w-[62px] border-gray-100 shadow-sm rounded-md font-semibold"
                                    type="text"
                                    id="from"
                                    v-model="expe.from"
                                />
                            </div>
                            <div class="flex items-center">to</div>
                            <div class="text-sm text-left py-2 pl-2">
                                <input
                                    class="flex w-[62px] border-gray-100 shadow-sm rounded-md font-semibold"
                                    type="text"
                                    id="to"
                                    v-model="expe.to"
                                />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </SeekerLayout>
    </AuthenticatedLayout>
</template>
