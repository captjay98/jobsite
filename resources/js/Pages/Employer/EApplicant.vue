<script setup>
import EmployerLayout from "@/Layouts/EmployerLayout.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { ref } from "vue";

const { applicant } = defineProps({
    applicant: Object,
});

const data = {
    status: ref(applicant.status),
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

const form = useForm(data);

// const updateApplication = () => {
//     form.patch(route("employer.applicant.update"));
// };

console.log(applicant);
</script>
<template>
    <EmployerLayout>
        <!-- <div class="m-auto my-8 px-4 py-4 mx-4 w-[98%] bg-gray-100"> -->
        <div class="w-full rounded-2xl py-4 m-auto bg-gray-100">
            <div
                class="flex justify-between items-center mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-md"
            >
                <h1 class="text-xl text-left font-semibold py-4">Applicant Details</h1>
                <!-- <form @submit.prevent="updateApplication"> -->
                <form>
                    <div class="text-sm text-left py-4 px-2 grid">
                        <select
                            class="focus:outline-0 ring-0 focus:ring-0 text-sm flex w- bg-gray-100 border-slate-300 shadow-2xl rounded-md font-"
                            :class="{
                                'bg-sky-200': data.status.value == 'applied',
                                'bg-yellow-400': data.status.value == 'reviewing',
                                'bg-green-400': data.status.value == 'accepted',
                                'bg-red-500': data.status.value == 'rejected',
                            }"
                            id="status"
                            v-model="data.status.value"
                        >
                            <option value="applied">Applied</option>
                            <option value="reviewing">Reviewing</option>
                            <option value="accepted">Accepted</option>
                            <option value="rejected">Rejected</option>
                        </select>
                        <div v-show="form.errors.status">
                            <p class="text-sm my-2 text-red-500">
                                {{ form.errors.status }}
                            </p>
                        </div>
                        <Link
                            :href="route('employer.applications.jobs.updateOne', applicant.id)"
                            as="button"
                            method="patch"
                            type="button"
                            :data="{ status: data.status.value }"
                        >
                            <p class="bg-blue-500 px-1 py-1 my-1 rounded-md text-center text-white">
                                Update Status
                            </p>
                            {{ console.log({ status: data.status.value }) }}
                        </Link>
                    </div>
                </form>
            </div>

            <div
                class="w-full flex flex-wrap justify-center bg-white rounded-md px-2 py-2 border-slate-800"
            >
                <div class="bg-white mx-1 my-4 w-full]">
                    <form class="w-full m-auto px-1 py-2 rounded-md" @submit.prevent="updateUser">
                        <div class="flex align-middle justify-center bg-white mb-4 w-full">
                            <div class="h-28 w-28 m-auto rounded-full">
                                <img
                                    class="w-full h-full"
                                    :src="'/storage/icons/avatar.png'"
                                    alt=""
                                />
                            </div>
                        </div>
                        <div class="mx-2 my-4 w-full flex flex-wrap justify-around">
                            <div
                                class="flex flex-wrap mt-8 m-auto justify-center lg:w-[50%] rounded-md"
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
                                        @input="changedFields.username = true"
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
                                        class="flex w-60 row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                        type="date"
                                        id="dateofbirth"
                                        v-model="form.dateofbirth"
                                    />
                                </div>
                            </div>
                            <div
                                class="flex flex-wrap bg-white mt-8 m-auto justify-center lg:w-[50%] rounded-md"
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
                            <div class="lg:w-[45%] mx-3">
                                <div class="m-auto w-[99%] px-4 py-4 bg-white rounded-md">
                                    <h1 class="text-xl text-center font-semibold">
                                        Qualifications
                                    </h1>
                                </div>

                                <div
                                    v-for="quali in form.qualifications"
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
                            <div class="lg:w-[45%] max-md:w-[100%] mt-6 mx-3">
                                <div class="m-auto w-[99%] px-4 py-4 bg-white rounded-md">
                                    <h1 class="text-xl text-center font-semibold">Skills</h1>
                                </div>

                                <div
                                    v-for="skill in form.skills"
                                    class="bg-blue-400 flex flex-wrap mt-8 m-auto justify-center rounded-md"
                                >
                                    <div class="bg-slate-400 w-full text-sm text-left pt-2 px-2">
                                        <input
                                            class="flex w-16 border-slate-200 shadow-sm rounded-md font-semibold"
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
                        <div v-show="form.experiences.length < 1">
                            The User Has not added any Expereince yet!
                        </div>
                        <div
                            v-for="expe in form.experiences"
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
            <div
                class="w-full flex flex-wrap justify-center bg-white rounded-md my-4 px-2 py-2 border-slate-800"
            >
                <div class="mt-2 m-auto w-[99%] px-4 py-2 bg-white rounded-md">
                    <h1 class="text-xl text-left font-semibold py-2">CV, Visa & Passport</h1>
                </div>

                <div class="flex align-middle justify-center bg-white">
                    <h1 class="h- w- m-auto bg-white rounded-full"></h1>
                </div>

                <div class="mx-4 my-4 lg:w-[80%] bg-white">
                    <form class="my-4 bg-white rounded-md" @submit.prevent="updateUser">
                        <div
                            class="flex flex-wrap bg-white mt-2 m-auto justify-around w-11/12 sm:w-10/12 rounded-md"
                        >
                            <div class="shadow-md w-56 h-72 text-sm text-left py-4 px-4">
                                <input
                                    class="w-full h-full border-gray-100 rounded-md font-semibold"
                                    type="text"
                                    id="at"
                                    v-model="form.cv"
                                />
                            </div>
                            <div class="shadow-md w-56 h-72 text-sm text-left py-4 px-4">
                                <input
                                    class="w-full h-full border-none shadow-sm rounded-md font-semibold"
                                    type="text"
                                    id="from"
                                    v-model="form.visa"
                                />
                            </div>
                            <div class="shadow-md w-56 h-72 text-sm text-left py-4 px-4">
                                <input
                                    class="w-full h-full border-none shadow-sm rounded-md font-semibold"
                                    type="text"
                                    id="to"
                                    v-model="form.passport"
                                />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </EmployerLayout>
</template>
