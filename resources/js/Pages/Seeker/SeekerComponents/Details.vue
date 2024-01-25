<script setup>
import Button from "@/Components/Button.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import { useToast } from "vue-toastification";

const toast = useToast()

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
            onSuccess: () => toast.info("Profile Info Updated")
        });
    }
    // console.log("DETAILS", updatedFields);
};
// console.log(seeker);
</script>
<template>
    <!-- {{ console.log("CHANGED DETAILS", updatedFields) }} -->
    <div class="w-full rounded-md my-4 py-2 m-auto bg-gray-100">
        <div class="w-full flex flex-wrap justify-center bg-white rounded-md px-1 py-2 border-slate-800">
            <form class="w-full m-auto px-1 py-2 rounded-md" @submit.prevent="updateUser">
                <div class="w-full flex flex-col items-center justify-center mb-4">
                    <!-- <div -->
                    <!--     V-show="seeker.user.avatar === null" -->
                    <!--     class="rounded-full flex justify-center w-[150px]" -->
                    <!-- > -->
                    <!--     <img -->
                    <!--         class="w-28 h-28" -->
                    <!--         :src="'/storage/icons/avatar.png'" -->
                    <!--         alt="Seeker Profile Picture" -->
                    <!--     /> -->
                    <!-- </div> -->

                    <!-- :src="'/storage/avatars/seekerone/yGRn5HCN11ZwY2eJ0gpxL6hNGugrO5DK3aLuNYTg.jpg'" -->
                    <div class="rounded-full flex justify-center w-[150px]">
                        <img v-if="seeker.user.avatar" class="w-28 h-28 rounded-full bg-blue-400"
                            alt="Seeker Profile Picture" :src="'storage/' + seeker.user.avatar" />
                        <div v-else class="w-28 h-28 rounded-full bg-blue-400"></div>
                    </div>
                    <input @input="form.avatar = $event.target.files[0]" type="file" id="avatar"
                        class="file:bg-white file:border-none file:outline-white w-12 ml-2 file: text-[10px] file:h-6" />
                    <Link as="button" method="post" :href="route('seeker.update')" :data="{
                        _method: 'put',
                        forceFormData: true,
                        preserveScroll: true,
                        avatar: form.avatar,
                    }">
                    <button class="bg-white px-1 py-1 mt-1 text-[10px]">Upload</button>
                    </Link>
                    <!-- <div class="py-6"> -->
                    <!--     <p class="text-sm px-2 py-2 text-center">Upload</p> -->
                    <!-- </div> -->
                </div>
                <div class="mx-2 my-4 w-full flex flex-wrap justify-around">
                    <div class="m-auto w-full px-1 py-4 bg-white rounded-md">
                        <h1 class="text-lg text-center font-semibold">Personal Details</h1>
                    </div>
                    <div
                        class="max-sm:grid max-sm:grid-cols-2  flex flex-wrap mt-2 m-auto justify-center xl:w-[45%] lg:w-[50%] rounded-md">


                        <div class="text-left py-4 px-2 max-sm:w-[160px]">
                            <label for="firstname"><span class="text-[12px] px-2">First Name:</span></label>
                            <input
                                class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text" id="firstname" v-model="form.firstname"
                                @input="updatedFields.firstname = true" />
                            <div v-show="form.errors.firstname">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.firstname }}
                                </p>
                            </div>
                        </div>
                        <div class="text-left py-4 px-2 max-sm:w-[160px]">
                            <label for="lastname"><span class="text-[12px] px-2">Last Name:</span></label>
                            <input
                                class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text" id="lastname" v-model="form.lastname" @input="updatedFields.lastname = true" />

                            <div v-show="form.errors.lastname">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.lastname }}
                                </p>
                            </div>
                        </div>
                        <div class="text-left py-4 px-2 max-sm:w-[160px]">
                            <label for="username"><span class="text-[12px] px-2">User Name:</span></label>
                            <input
                                class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text" id="username" v-model="form.username" @input="updatedFields.username = true" />
                            <div v-show="form.errors.username">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.username }}
                                </p>
                            </div>
                        </div>
                        <div class="text-left py-4 px-2 max-sm:w-[160px]">
                            <label for="email"><span class="text-[12px] px-2">Email:</span></label>
                            <input
                                class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text" id="email" v-model="form.email" @input="updatedFields.email = true" />
                            <div v-show="form.errors.email">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.email }}
                                </p>
                            </div>
                        </div>
                        <div class="text-left py-4 px-2 max-sm:w-[160px]">
                            <label for="phone"><span class="text-[12px] px-2">Phone:</span></label>
                            <input
                                class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text" id="phone" v-model="form.phone" @input="updatedFields.phone = true" />

                            <div v-show="form.errors.phone">
                                <p class="text-sm my-2 text-red-500 w-[160px]">
                                    {{ form.errors.phone }}
                                </p>
                            </div>
                        </div>
                        <div class="text-left py-4 px-2 max-sm:w-[160px]">
                            <label for="dateofbirth"><span class="text-[12px] px-2">DOB:</span></label>
                            <input
                                class="flex h-8 md:w-[185px] text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="date" id="dateofbirth" v-model="form.dateofbirth"
                                @input="updatedFields.dateofbirth = true" />

                            <div v-show="form.errors.dateofbirth">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.dateofbirth }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap bg-white mt-2 m-auto justify-center xl:w-[45%] lg:w-[50%] rounded-md">
                        <!-- <div class="m-auto w-[99%] px-4 py-4 bg-white rounded-md">
                            <h1 class="text-lg text-center font-semibold">Other Details</h1>
                        </div> -->

                        <div class="text-left py-4 px-2 max-sm:w-[150px]">
                            <label for="city"><span class="text-[12px] px-2">City:</span></label>
                            <input
                                class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text" id="city" v-model="form.city" @input="updatedFields.city = true" />
                            <div v-show="form.errors.city">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.city }}
                                </p>
                            </div>
                        </div>
                        <div class="text-left py-4 px-2 max-sm:w-[150px]">
                            <label for="state"><span class="text-[12px] px-2">State:</span></label>
                            <input
                                class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text" id="state" v-model="form.state" @input="updatedFields.state = true" />

                            <div v-show="form.errors.state">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.state }}
                                </p>
                            </div>
                        </div>
                        <div class="text-left py-4 px-2 max-sm:w-[150px]">
                            <label for="country"><span class="text-[12px] px-2">Country:</span></label>
                            <input
                                class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text" id="country" v-model="form.country" @input="updatedFields.country = true" />
                            <div v-show="form.errors.country">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.country }}
                                </p>
                            </div>
                        </div>
                        <div class="text-left py-4 px-2 max-sm:w-[150px]">
                            <label for="ethnicity"><span class="text-[12px] px-2">Ethnicity:</span></label>
                            <input
                                class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text" id="ethnicity" v-model="form.ethnicity"
                                @input="updatedFields.ethnicity = true" />
                            <div v-show="form.errors.ethnicity">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.ethnicity }}
                                </p>
                            </div>
                        </div>

                        <!-- <div class="text-left py-4 px-2 max-sm:w-[150px]"> -->
                        <!--     <label for="profession" -->
                        <!--         ><span class="text-[12px] px-2">Profession:</span></label -->
                        <!--     > -->
                        <!--     <input -->
                        <!--         class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold" -->
                        <!--         type="text" -->
                        <!--         id="ethnicity" -->
                        <!--         v-model="form.profession" -->
                        <!--         @input="updatedFields.profession = true" -->
                        <!--     /> -->
                        <!--     <div v-show="form.errors.profession"> -->
                        <!--         <p class="text-sm my-2 text-red-500 w-60"> -->
                        <!--             {{ form.errors.profession }} -->
                        <!--         </p> -->
                        <!--     </div> -->
                        <!-- </div> -->

                        <!-- <div class="text-left py-4 px-2 max-sm:w-[150px]"> -->
                        <!--     <label for="industry" -->
                        <!--         ><span class="text-[12px] px-2">Industry:</span></label -->
                        <!--     > -->
                        <!--     <input -->
                        <!--         class="flex h-8 w-full text-[13px] row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold" -->
                        <!--         type="text" -->
                        <!--         id="industry" -->
                        <!--         v-model="form.industry" -->
                        <!--         @input="updatedFields.industry = true" -->
                        <!--     /> -->
                        <!--     <div v-show="form.errors.industry"> -->
                        <!--         <p class="text-sm my-2 text-red-500 w-60"> -->
                        <!--             {{ form.errors.industry }} -->
                        <!--         </p> -->
                        <!--     </div> -->
                        <!-- </div> -->
                    </div>
                </div>
                <div class="flex justify-center w-64 m-auto">
                    <Button :disabled="form.processing" type="submit"> Update </Button>
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
