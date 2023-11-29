<script setup>
import SeekerLayout from "@/Layouts/SeekerLayout.vue";
import Files from "@/Pages/Seeker/SeekerComponents/Files.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { ref } from "vue";

const { applicant } = defineProps({
    applicant: Object,
    error: Array,
});

const user = {
    status: ref(applicant.status),
    avatar: ref(applicant.seeker.user.avatar),
    firstname: ref(applicant.seeker.user.firstname),
    lastname: ref(applicant.seeker.user.lastname),
    username: ref(applicant.seeker.user.username),
    email: ref(applicant.seeker.user.email),
    phone: ref(applicant.seeker.phone),
    dateofbirth: ref(applicant.seeker.dateofbirth),
    city: ref(applicant.seeker.city),
    state: ref(applicant.seeker.state),
    country: ref(applicant.seeker.country),
    ethnicity: ref(applicant.seeker.ethnicity),
    qualifications: ref(applicant.seeker.qualifications),
    experiences: ref(applicant.seeker.experiences),
    skills: ref(applicant.seeker.skills),
    cv: ref(applicant.seeker.cv),
    visa: ref(applicant.seeker.visa),
    passport: ref(applicant.seeker.passport),
};

const form = useForm(user);

const qualifications = user.qualifications;
const experiences = user.experiences;
const skills = user.skills;

console.log(applicant);
</script>
<template>
    <SeekerLayout>
        <div class="w-full rounded-2xl py-4 m-auto bg-gray-100">
            <div
                class="flex justify-between items-center mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-md"
            >
                <h1 class="text-xl text-left font-semibold py-4">applicant Details</h1>
                <form action="">
                    <div class="text-sm text-left py-4 px-2">
                        <select
                            class="outline-none ring-0 text-sm flex w- bg-gray-100 border-slate-300 shadow-2xl rounded-md font-"
                            :class="{
                                'bg-blue-400': form.status == 'applied',
                                'bg-yellow-300': form.status == 'reviewing',
                                'bg-green-400': form.status == 'accepted',
                                'bg-red-500': form.status == 'rejected',
                            }"
                            id="status"
                            v-model="form.status"
                            disabled
                        >
                            <option value="applied">Applied</option>
                            <option value="reviewing">Reviewing</option>
                            <option value="accepted">Accepted</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="w-full rounded-md my-4 py-2 m-auto bg-gray-100">
                <div
                    class="w-full flex flex-wrap justify-center bg-white rounded-md px-1 py-2 border-slate-800"
                >
                    <form class="w-full m-auto px-1 py-2 rounded-md">
                        <div class="w-[70%] pl-14 m-auto flex justify-center mb-4">
                            <div class="rounded-full">
                                <img
                                    class="w-28 h-28"
                                    :src="'/storage/icons/avatar.png'"
                                    alt="Seeker Profile Picture"
                                />
                                <!-- STYLE THE FILE INPUT -->
                                <!-- <input -->
                                <!--     @input="fileForm.avatar = $event.target.files[0]" -->
                                <!--     type="file" -->
                                <!--     id="avatar" -->
                                <!--     class="bg-white" -->
                                <!-- /> -->
                            </div>
                            <div class="py-6"></div>
                        </div>
                        <div class="mx-2 my-4 w-full flex flex-wrap justify-around">
                            <div
                                class="flex flex-wrap mt-2 m-auto justify-center xl:w-[45%] lg:w-[50%] rounded-md"
                            >
                                <div class="m-auto w-full px-1 py-4 bg-white rounded-md">
                                    <h1 class="text-lg text-center font-semibold">
                                        Personal Details
                                    </h1>
                                </div>

                                <div class="text-left py-4 px-2 max-sm:w-[150px]">
                                    <label for="firstname"
                                        ><span class="text-[12px] px-2">First Name:</span></label
                                    >
                                    <input
                                        class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="firstname"
                                        v-model="form.firstname"
                                    />
                                </div>
                                <div class="text-left py-4 px-2 max-sm:w-[150px]">
                                    <label for="lastname"
                                        ><span class="text-[12px] px-2">Last Name:</span></label
                                    >
                                    <input
                                        class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="lastname"
                                        v-model="form.lastname"
                                    />
                                </div>
                                <div class="text-left py-4 px-2 max-sm:w-[150px]">
                                    <label for="username"
                                        ><span class="text-[12px] px-2">User Name:</span></label
                                    >
                                    <input
                                        class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="username"
                                        v-model="form.username"
                                    />
                                </div>
                                <div class="text-left py-4 px-2 max-sm:w-[150px]">
                                    <label for="email"
                                        ><span class="text-[12px] px-2">Email:</span></label
                                    >
                                    <input
                                        class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="email"
                                        v-model="form.email"
                                    />
                                </div>
                                <div class="text-left py-4 px-2 max-sm:w-[150px]">
                                    <label for="phone"
                                        ><span class="text-[12px] px-2">Phone:</span></label
                                    >
                                    <input
                                        class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="phone"
                                        v-model="form.phone"
                                    />
                                </div>
                                <div class="text-left py-4 px-2 max-sm:w-[150px]">
                                    <label for="dateofbirth"
                                        ><span class="text-[12px] px-2">DOB:</span></label
                                    >
                                    <input
                                        class="flex h-8 md:w-[190px] text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="date"
                                        id="dateofbirth"
                                        v-model="form.dateofbirth"
                                    />
                                </div>
                            </div>
                            <div
                                class="flex flex-wrap bg-white mt-2 m-auto justify-center xl:w-[45%] lg:w-[50%] rounded-md"
                            >
                                <div class="m-auto w-[99%] px-4 py-4 bg-white rounded-md">
                                    <h1 class="text-lg text-center font-semibold">Other Details</h1>
                                </div>

                                <div class="text-left py-4 px-2 max-sm:w-[150px]">
                                    <label for="city"
                                        ><span class="text-[12px] px-2">City:</span></label
                                    >
                                    <input
                                        class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="city"
                                        v-model="form.city"
                                    />
                                </div>
                                <div class="text-left py-4 px-2 max-sm:w-[150px]">
                                    <label for="state"
                                        ><span class="text-[12px] px-2">State:</span></label
                                    >
                                    <input
                                        class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="state"
                                        v-model="form.state"
                                    />
                                </div>
                                <div class="text-left py-4 px-2 max-sm:w-[150px]">
                                    <label for="country"
                                        ><span class="text-[12px] px-2">Country:</span></label
                                    >
                                    <input
                                        class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="country"
                                        v-model="form.country"
                                    />
                                </div>

                                <div class="text-left py-4 px-2 max-sm:w-[150px]">
                                    <label for="ethnicity"
                                        ><span class="text-[12px] px-2">Ethnicity:</span></label
                                    >
                                    <input
                                        class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="ethnicity"
                                        v-model="form.ethnicity"
                                    />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="w-full flex flex-wrap justify-around bg-white rounded-md my-2 px-1 py-1">
                <!-- EXPERIENCES -->
                <div class="mx-1 my-4 xl:w-[35%] lg:w-50%">
                    <div class="mt-1 m-auto w-[99%] px-2 py-2 bg-white rounded-md">
                        <h1 class="text-xl text-center font-semibold py-1">Experiences</h1>
                    </div>
                    <div v-show="!experiences">
                        <div class="text-sm h-24 mx-8 my-8">No Experiences Added</div>
                    </div>
                    <form class="my-2 bg-white rounded-md" @submit.prevent="updateExpe">
                        <div
                            :key="expe.id"
                            v-for="expe in experiences"
                            class="hover:shadow-2xl hover:translate-x-1 border-inherit border-[1px] py-1 px-2 flex my-1 shadow-sm flex-wrap justify-around mt-1 m-auto w-full lg:w-[90%] rounded-md"
                        >
                            <div
                                class="text-white bg-blue-400 mt-12 w-[130px] h-[28px] px-1 pb-1 rounded-md flex align-middle"
                            >
                                <div class="bg-blue-400 text-sm text-left py-2 px-">
                                    <input
                                        class="bg-blue-400 text-center text-[11px] h-full flex w-[50%] border-none shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="from"
                                        v-model="expe.from"
                                    />
                                </div>
                                <div class="bg-slat300 flex items-center">-</div>
                                <div class="text-sm text-left py-2">
                                    <input
                                        class="bg-blue-400 text-center text-[11px] h-full flex w-[50%] border-none shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="to"
                                        v-model="expe.to"
                                    />
                                </div>
                            </div>
                            <div class="-300">
                                <div class="max-sm:w-[150px] m-auto text-sm text-left py-2 px-">
                                    <input
                                        class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="title"
                                        v-model="expe.title"
                                    />
                                </div>
                                <div class="flex items-center justify-center">-</div>
                                <div class="max-sm:w-[150px] m-auto text-sm text-left py-2 px-">
                                    <input
                                        class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="place"
                                        v-model="expe.place"
                                    />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- QUALIFICATIONS -->
                <div class="mx-1 my-4 xl:w-[35%] lg:w-50%">
                    <div class="mt-1 m-auto w-[99%] px-2 py-2 bg-white rounded-md">
                        <h1 class="text-xl text-center font-semibold py-1">Qualifications</h1>
                    </div>

                    <div v-show="!qualifications">
                        <div class="text-sm h-24 mx-8 my-8">No Qualifications Added</div>
                    </div>
                    <form class="my-2 bg-white rounded-md" @submit.prevent="updateQuali">
                        <div
                            :key="quali.id"
                            v-for="quali in qualifications"
                            class="border-inherit border-[1px] py-1 px-2 flex my-1 shadow-sm flex-wrap justify-around mt-1 m-auto w-full lg:w-[90%] rounded-md"
                        >
                            <div
                                class="text-white bg-blue-400 mt-12 w-[130px] h-[28px] px-1 pb-1 rounded-md flex align-middle"
                            >
                                <div class="bg-blue-400 text-sm text-left py-2 px-">
                                    <input
                                        class="bg-blue-400 text-center text-[11px] h-full flex w-[50%] border-none shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="from"
                                        v-model="quali.from"
                                    />
                                </div>
                                <div class="bg-slat300 flex items-center">-</div>
                                <div class="text-sm text-left py-2">
                                    <input
                                        class="bg-blue-400 text-center text-[11px] h-full flex w-[50%] border-none shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="to"
                                        v-model="quali.to"
                                    />
                                </div>
                            </div>
                            <div class="-300">
                                <div class="max-sm:w-[150px] m-auto text-sm text-left py-2 px-">
                                    <input
                                        class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="title"
                                        v-model="quali.title"
                                    />
                                </div>
                                <div class="flex items-center justify-center">-</div>
                                <div class="max-sm:w-[150px] m-auto text-sm text-left py-2 px-">
                                    <input
                                        class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                                        type="text"
                                        id="place"
                                        v-model="quali.place"
                                    />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- SKILLS -->
            <div
                class="w-full bg-white flex flex-wrap justify-center rounded-md my-4 px-2 py-2 border-slate-800"
            >
                <div class="lg:w-[48%] mx-3 m-auto h-auto">
                    <div class="m-auto w-[99%] px-4 py-4 rounded-md">
                        <h1 class="text-xl text-center font-semibold">Skills</h1>
                    </div>
                    <form class="flex flex-wrap justify-center" @submit.prevent="updateSkill">
                        <div class="h-5 my-4" v-show="!skills">
                            <p class="text-center">No Skills Added Yet</p>
                        </div>
                        <div
                            v-for="skill in skills"
                            class="flex flex-wrap mt-8 m-auto justify-center rounded-md"
                        >
                            <div class="text-sm text-left pt-2 px-2">
                                <input
                                    class="flex w-16 border-slate-200 shadow-sm rounded-md font-semibold"
                                    id="name"
                                    v-model="skill.name"
                                />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- FILES -->
            <Files :files="{ cv: user.cv, visa: user.visa, passport: user.passport }" />
        </div>
    </SeekerLayout>
</template>
