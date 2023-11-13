<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const { application } = defineProps({
    application: Object,
});

console.log(application);

// const application = {
//     status: (application.status),
//     firstname: ref(application.seeker.user.firstname),
//     lastname: ref(application.seeker.user.lastname),
//     username: ref(application.seeker.user.username),
//     email: ref(application.seeker.user.email),
//     phone: ref(application.seeker.phone),
//     dateofbirth: ref(application.seeker.dateofbirth),
//     city: ref(application.seeker.city),
//     state: ref(application.seeker.state),
//     country: ref(application.seeker.country),
//     ethnicity: ref(application.seeker.ethnicity),
//     qualifications: ref(application.seeker.qualifications),
//     experiences: ref(application.seeker.experiences),
//     skills: ref(application.seeker.skills),
//     cv: ref(application.seeker.cv),
//     visa: ref(application.seeker.visa),
//     passport: ref(application.seeker.passport),
// };

// const updateApplication = () => {
//     application.patch(route("employer.application.update"));
// };

console.log(application);
</script>
<template>
    <AdminLayout>
        <!-- <div class="m-auto my-8 px-4 py-4 mx-4 w-[98%] bg-gray-100"> -->
        <div class="w-full rounded-2xl py-4 m-auto bg-gray-100">
            <div
                class="flex justify-between items-center mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-md"
            >
                <h1 class="text-xl text-left font-semibold py-4">Application Details</h1>
                <!-- <application @submit.prevent="updateApplication"> -->
                <form>
                    <div class="text-sm text-left py-4 px-2 grid">
                        <input
                            class="focus:outline-0 ring-0 focus:ring-0 text-sm flex w-40 text-center font-semibold bg-gray-100 border-slate-300 shadow-2xl rounded-md font-"
                            :class="{
                                'bg-sky-200': application.status == 'applied',
                                'bg-yellow-400': application.status == 'reviewing',
                                'bg-green-400': application.status == 'accepted',
                                'bg-red-500': application.status == 'rejected',
                            }"
                            id="status"
                            v-model="application.status"
                            disabled
                        />
                    </div>
                </form>
            </div>

            <div
                class="w-full flex flex-wrap justify-center bg-white rounded-md px-2 py-2 border-slate-800"
            >
                <div class="bg-white mx-1 my-4 w-full]">
                    <form class="w-full m-auto px-1 py-2 rounded-md">
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
                                        v-model="application.seeker.user.firstname"
                                        disabled
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
                                        v-model="application.seeker.user.lastname"
                                        disabled
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
                                        v-model="application.seeker.user.username"
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
                                        v-model="application.seeker.user.email"
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
                                        v-model="application.seeker.phone"
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
                                        v-model="application.seeker.dateofbirth"
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
                                        v-model="application.seeker.city"
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
                                        v-model="application.seeker.state"
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
                                        v-model="application.seeker.country"
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
                                        v-model="application.seeker.ethnicity"
                                    />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div
                    class="w-full bg-white flex flex-wrap justify-center rounded-md my-4 px-1 py-2 border-slate-800"
                >
                    <form class="w-full my-4 rounded-md">
                        <div class="mx-2 my-4 w-full flex flex-wrap justify-around">
                            <div class="lg:w-[45%] mx-3">
                                <div class="m-auto w-[99%] px-4 py-4 bg-white rounded-md">
                                    <h1 class="text-xl text-center font-semibold">
                                        Qualifications
                                    </h1>
                                </div>

                                <div
                                    v-for="quali in application.seeker.qualifications"
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

                                <!-- <div -->
                                <!--     v-for="skill in application.seeker.skills" -->
                                <!--     class="bg-blue-400 flex flex-wrap mt-8 m-auto justify-center rounded-md" -->
                                <!-- > -->
                                <!--     <div class="bg-slate-400 w-full text-sm text-left pt-2 px-2"> -->
                                <!--         <input -->
                                <!--             class="flex w-16 border-slate-200 shadow-sm rounded-md font-semibold" -->
                                <!--             id="from" -->
                                <!--             v-model="skill.from" -->
                                <!--         /> -->
                                <!--     </div> -->
                                <!-- </div> -->
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
                    <form class="my-4 bg-white rounded-md">
                        <div v-show="application.seeker.experiences.length < 1">
                            The User Has not added any Expereince yet!
                        </div>
                        <div
                            v-for="expe in application.seeker.experiences"
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
                    <form class="my-4 bg-white rounded-md">
                        <div
                            class="flex flex-wrap bg-white mt-2 m-auto justify-around w-11/12 sm:w-10/12 rounded-md"
                        >
                            <div class="shadow-md w-56 h-72 text-sm text-left py-4 px-4">
                                <input
                                    class="w-full h-full border-gray-100 rounded-md font-semibold"
                                    type="text"
                                    id="at"
                                    v-model="application.cv"
                                />
                            </div>
                            <div class="shadow-md w-56 h-72 text-sm text-left py-4 px-4">
                                <input
                                    class="w-full h-full border-none shadow-sm rounded-md font-semibold"
                                    type="text"
                                    id="from"
                                    v-model="application.visa"
                                />
                            </div>
                            <div class="shadow-md w-56 h-72 text-sm text-left py-4 px-4">
                                <input
                                    class="w-full h-full border-none shadow-sm rounded-md font-semibold"
                                    type="text"
                                    id="to"
                                    v-model="application.passport"
                                />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </AdminLayout>
</template>
