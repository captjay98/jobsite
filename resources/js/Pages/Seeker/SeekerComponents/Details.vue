<script setup>
import Button from "@/Components/Button.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import { useToast } from "vue-toastification";

const toast = useToast();

const { seeker } = defineProps({
    seeker: Object,
});

const form = useForm({
    avatar: ref(seeker.user.avatar),
    firstname: ref(seeker.user.firstname),
    lastname: ref(seeker.user.lastname),
    username: ref(seeker.user.username),
    email: ref(seeker.user.email),
    phone: ref(seeker.phone),
    dateofbirth: ref(seeker.dateofbirth),
    city: ref(seeker.city),
    state: ref(seeker.state),
    country: ref(seeker.country),
    ethnicity: ref(seeker.ethnicity),
    // profeesion: ref(seeker.profession),
    // industry: ref(seeker.industry),
});

const updatedFields = computed(() => {
    const updatedFields = {};
    for (const key in form.value) {
        if (form.value[key] !== seeker.user[key]) {
            updatedFields[key] = form.value[key];
        }
    }
    return updatedFields;
});

const updateUser = () => {
    if (!updatedFields.value.isEmpty) {
        form.put(route("seeker.update"), {
            ...updatedFields.value,
            preserveScroll: true,
            onSuccess: () => toast.info("Profile Info Updated"),
        });
    }
    // console.log("DETAILS", updatedFields);
};
// console.log(seeker);
</script>
<template>
    <!-- {{ console.log("CHANGED DETAILS", updatedFields) }} -->
    <div class="py-2 m-auto my-4 w-full bg-gray-100 rounded-md">
        <div class="flex flex-wrap justify-center py-2 px-1 w-full bg-white rounded-md border-slate-800">
            <form class="py-2 px-1 m-auto w-full rounded-md" @submit.prevent="updateUser">
                <div class="flex flex-col justify-center items-center mb-4 w-full">
                    <!-- <div -->
                    <!--     V-show="seeker.user.avatar === null" -->
                    <!--     class="flex justify-center rounded-full w-[150px]" -->
                    <!-- > -->
                    <!--     <img -->
                    <!--         class="w-28 h-28" -->
                    <!--         :src="'/storage/icons/avatar.png'" -->
                    <!--         alt="Seeker Profile Picture" -->
                    <!--     /> -->
                    <!-- </div> -->

                    <div class="flex justify-center rounded-full w-[150px]">
                        <img v-if="seeker.user.avatar" class="w-28 h-28 bg-blue-400 rounded-full"
                            alt="Seeker Profile Picture" :src="'/storage/' + seeker.user.avatar" />
                        <div v-else class="w-28 h-28 bg-blue-400 rounded-full"></div>
                    </div>
                    <input @input="form.avatar = $event.target.files[0]" type="file" id="avatar"
                        class="ml-2 w-12 file:bg-white file:border-none file:outline-white file: text-[10px] file:h-6" />
                    <Link as="button" method="post" :href="route('seeker.update')" :data="{
                        _method: 'put',
                        forceFormData: true,
                        preserveScroll: true,
                        avatar: form.avatar,
                    }">
                    <button class="py-1 px-1 mt-1 bg-white text-[10px]">
                        Upload
                    </button>
                    </Link>
                </div>
                <div class="flex flex-wrap justify-around my-4 mx-2 w-full">
                    <div class="py-4 px-1 m-auto w-full bg-white rounded-md">
                        <h1 class="text-lg font-semibold text-center">
                            Personal Details
                        </h1>
                    </div>
                    <div
                        class="max-sm:grid max-sm:grid-cols-2 flex flex-wrap mt-2 m-auto justify-center xl:w-[45%] lg:w-[50%] rounded-md">
                        <div class="py-4 px-2 text-left max-sm:w-[160px]">
                            <label for="firstname"><span class="px-2 text-[12px]">First Name:</span></label>
                            <input
                                class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-sm text-[13px] row border-slate-300"
                                type="text" id="firstname" v-model="form.firstname"
                                @input="updatedFields.firstname = true" />
                            <div v-show="form.errors.firstname">
                                <p class="my-2 w-60 text-sm text-red-500">
                                    {{ form.errors.firstname }}
                                </p>
                            </div>
                        </div>
                        <div class="py-4 px-2 text-left max-sm:w-[160px]">
                            <label for="lastname"><span class="px-2 text-[12px]">Last Name:</span></label>
                            <input
                                class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-sm text-[13px] row border-slate-300"
                                type="text" id="lastname" v-model="form.lastname" @input="updatedFields.lastname = true" />

                            <div v-show="form.errors.lastname">
                                <p class="my-2 w-60 text-sm text-red-500">
                                    {{ form.errors.lastname }}
                                </p>
                            </div>
                        </div>
                        <div class="py-4 px-2 text-left max-sm:w-[160px]">
                            <label for="username"><span class="px-2 text-[12px]">User Name:</span></label>
                            <input
                                class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-sm text-[13px] row border-slate-300"
                                type="text" id="username" v-model="form.username" @input="updatedFields.username = true" />
                            <div v-show="form.errors.username">
                                <p class="my-2 w-60 text-sm text-red-500">
                                    {{ form.errors.username }}
                                </p>
                            </div>
                        </div>
                        <div class="py-4 px-2 text-left max-sm:w-[160px]">
                            <label for="email"><span class="px-2 text-[12px]">Email:</span></label>
                            <input
                                class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-sm text-[13px] row border-slate-300"
                                type="text" id="email" v-model="form.email" @input="updatedFields.email = true" />
                            <div v-show="form.errors.email">
                                <p class="my-2 w-60 text-sm text-red-500">
                                    {{ form.errors.email }}
                                </p>
                            </div>
                        </div>
                        <div class="py-4 px-2 text-left max-sm:w-[160px]">
                            <label for="phone"><span class="px-2 text-[12px]">Phone:</span></label>
                            <input
                                class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-sm text-[13px] row border-slate-300"
                                type="text" id="phone" v-model="form.phone" @input="updatedFields.phone = true" />

                            <div v-show="form.errors.phone">
                                <p class="my-2 text-sm text-red-500 w-[160px]">
                                    {{ form.errors.phone }}
                                </p>
                            </div>
                        </div>
                        <div class="py-4 px-2 text-left max-sm:w-[160px]">
                            <label for="dateofbirth"><span class="px-2 text-[12px]">DOB:</span></label>
                            <input
                                class="flex h-8 font-semibold bg-gray-100 rounded-md shadow-sm text-[13px] row border-slate-300 md:w-[185px]"
                                type="date" id="dateofbirth" v-model="form.dateofbirth"
                                @input="updatedFields.dateofbirth = true" />

                            <div v-show="form.errors.dateofbirth">
                                <p class="my-2 w-60 text-sm text-red-500">
                                    {{ form.errors.dateofbirth }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap bg-white mt-2 m-auto justify-center xl:w-[45%] lg:w-[50%] rounded-md">
                        <!-- <div class="m-auto w-[99%] px-4 py-4 bg-white rounded-md">
                            <h1 class="text-lg font-semibold text-center">Other Details</h1>
                        </div> -->

                        <div class="py-4 px-2 text-left max-sm:w-[150px]">
                            <label for="city"><span class="px-2 text-[12px]">City:</span></label>
                            <input
                                class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-sm text-[13px] row border-slate-300"
                                type="text" id="city" v-model="form.city" @input="updatedFields.city = true" />
                            <div v-show="form.errors.city">
                                <p class="my-2 w-60 text-sm text-red-500">
                                    {{ form.errors.city }}
                                </p>
                            </div>
                        </div>
                        <div class="py-4 px-2 text-left max-sm:w-[150px]">
                            <label for="state"><span class="px-2 text-[12px]">State:</span></label>
                            <input
                                class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-sm text-[13px] row border-slate-300"
                                type="text" id="state" v-model="form.state" @input="updatedFields.state = true" />

                            <div v-show="form.errors.state">
                                <p class="my-2 w-60 text-sm text-red-500">
                                    {{ form.errors.state }}
                                </p>
                            </div>
                        </div>
                        <div class="py-4 px-2 text-left max-sm:w-[150px]">
                            <label for="country"><span class="px-2 text-[12px]">Country:</span></label>
                            <input
                                class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-sm text-[13px] row border-slate-300"
                                type="text" id="country" v-model="form.country" @input="updatedFields.country = true" />
                            <div v-show="form.errors.country">
                                <p class="my-2 w-60 text-sm text-red-500">
                                    {{ form.errors.country }}
                                </p>
                            </div>
                        </div>
                        <div class="py-4 px-2 text-left max-sm:w-[150px]">
                            <label for="ethnicity"><span class="px-2 text-[12px]">Ethnicity:</span></label>
                            <input
                                class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-sm text-[13px] row border-slate-300"
                                type="text" id="ethnicity" v-model="form.ethnicity"
                                @input="updatedFields.ethnicity = true" />
                            <div v-show="form.errors.ethnicity">
                                <p class="my-2 w-60 text-sm text-red-500">
                                    {{ form.errors.ethnicity }}
                                </p>
                            </div>
                        </div>

                        <!-- <div class="py-4 px-2 text-left max-sm:w-[150px]"> -->
                        <!--     <label for="profession" -->
                        <!--         ><span class="px-2 text-[12px]">Profession:</span></label -->
                        <!--     > -->
                        <!--     <input -->
                        <!--         class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-sm text-[13px] row border-slate-300" -->
                        <!--         type="text" -->
                        <!--         id="ethnicity" -->
                        <!--         v-model="form.profession" -->
                        <!--         @input="updatedFields.profession = true" -->
                        <!--     /> -->
                        <!--     <div v-show="form.errors.profession"> -->
                        <!--         <p class="my-2 w-60 text-sm text-red-500"> -->
                        <!--             {{ form.errors.profession }} -->
                        <!--         </p> -->
                        <!--     </div> -->
                        <!-- </div> -->

                        <!-- <div class="py-4 px-2 text-left max-sm:w-[150px]"> -->
                        <!--     <label for="industry" -->
                        <!--         ><span class="px-2 text-[12px]">Industry:</span></label -->
                        <!--     > -->
                        <!--     <input -->
                        <!--         class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-sm text-[13px] row border-slate-300" -->
                        <!--         type="text" -->
                        <!--         id="industry" -->
                        <!--         v-model="form.industry" -->
                        <!--         @input="updatedFields.industry = true" -->
                        <!--     /> -->
                        <!--     <div v-show="form.errors.industry"> -->
                        <!--         <p class="my-2 w-60 text-sm text-red-500"> -->
                        <!--             {{ form.errors.industry }} -->
                        <!--         </p> -->
                        <!--     </div> -->
                        <!-- </div> -->
                    </div>
                </div>
                <div class="flex justify-center m-auto w-64">
                    <Button :disabled="form.processing" type="submit">
                        Update
                    </Button>
                </div>
            </form>
        </div>
    </div>
</template>

<!-- const qualiForm = useForm({ -->
<!--     qualifications: seeker.qualifications, -->
<!-- }); -->
<!-- const expeForm = useForm({ -->
<!--     experiences: seeker.experiences, -->
<!-- }); -->
