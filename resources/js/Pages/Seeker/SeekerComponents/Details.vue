<script setup>
import Button from "@/Components/Button.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";

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
        });
    }
    console.log("DETAILS", updatedFields);
};
</script>
<template>
    {{ console.log("CHANGED DETAILS", updatedFields) }}
    <div class="w-full rounded-2xl py-2 m-auto bg-gray-100">
        <div
            class="w-full flex flex-wrap justify-center bg-white rounded-md px-2 py-2 border-slate-800"
        >
            <form class="w-full m-auto px-1 py-2 rounded-md" @submit.prevent="updateUser">
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
                    <div class="py-6">
                        <p class="text-sm px-2 py-2 text-center">Select</p>
                        <p class="text-sm px-2 py-2 text-center">Upload</p>
                    </div>
                </div>
                <div class="mx-2 my-4 w-full flex flex-wrap justify-around">
                    <div class="flex flex-wrap mt-2 m-auto justify-center lg:w-[50%] rounded-md">
                        <div class="m-auto w-[99%] px-4 py-4 bg-white rounded-md">
                            <h1 class="text-xl text-center font-semibold">Personal Details</h1>
                        </div>

                        <div class="text-sm text-left py-4 px-4">
                            <label for="firstname"
                                ><span class="text-sm px-2">First Name:</span></label
                            >
                            <input
                                class="flex h-8 w-56 row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text"
                                id="firstname"
                                v-model="form.firstname"
                                @input="updatedFields.firstname = true"
                            />
                            <div v-show="form.errors.firstname">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.firstname }}
                                </p>
                            </div>
                        </div>
                        <div class="text-sm text-left py-4 px-4">
                            <label for="lastname"
                                ><span class="text-sm px-2">Last Name:</span></label
                            >
                            <input
                                class="flex h-8 w-56 row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text"
                                id="lastname"
                                v-model="form.lastname"
                                @input="updatedFields.lastname = true"
                            />

                            <div v-show="form.errors.lastname">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.lastname }}
                                </p>
                            </div>
                        </div>
                        <div class="text-sm text-left py-4 px-4">
                            <label for="username"
                                ><span class="text-sm px-2">User Name:</span></label
                            >
                            <input
                                class="flex h-8 w-56 row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text"
                                id="username"
                                v-model="form.username"
                                @input="updatedFields.username = true"
                            />
                            <div v-show="form.errors.username">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.username }}
                                </p>
                            </div>
                        </div>
                        <div class="text-sm text-left py-4 px-4">
                            <label for="email"><span class="text-sm px-2">Email:</span></label>
                            <input
                                class="flex h-8 w-56 row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text"
                                id="email"
                                v-model="form.email"
                                @input="updatedFields.email = true"
                            />
                            <div v-show="form.errors.email">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.email }}
                                </p>
                            </div>
                        </div>
                        <div class="text-sm text-left py-4 px-4">
                            <label for="phone"><span class="text-sm px-2">Phone:</span></label>
                            <input
                                class="flex h-8 w-56 row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text"
                                id="phone"
                                v-model="form.phone"
                                @input="updatedFields.phone = true"
                            />

                            <div v-show="form.errors.phone">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.phone }}
                                </p>
                            </div>
                        </div>
                        <div class="text-sm text-left py-4 px-4">
                            <label for="dateofbirth"><span class="text-sm px-2">DOB:</span></label>
                            <input
                                class="flex h-8 w-56 row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="date"
                                id="dateofbirth"
                                v-model="form.dateofbirth"
                                @input="updatedFields.dateofbirth = true"
                            />

                            <div v-show="form.errors.dateofbirth">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.dateofbirth }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-wrap bg-white mt-2 m-auto justify-center lg:w-[50%] rounded-md"
                    >
                        <div class="m-auto w-[99%] px-4 py-4 bg-white rounded-md">
                            <h1 class="text-xl text-center font-semibold">Other Details</h1>
                        </div>

                        <div class="text-sm text-left py-4 px-4">
                            <label for="city"><span class="text-sm px-2">City:</span></label>
                            <input
                                class="flex h-8 w-56 row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text"
                                id="city"
                                v-model="form.city"
                                @input="updatedFields.city = true"
                            />
                            <div v-show="form.errors.city">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.city }}
                                </p>
                            </div>
                        </div>
                        <div class="text-sm text-left py-4 px-4">
                            <label for="state"><span class="text-sm px-2">State:</span></label>
                            <input
                                class="flex h-8 w-56 row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text"
                                id="state"
                                v-model="form.state"
                                @input="updatedFields.state = true"
                            />

                            <div v-show="form.errors.state">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.state }}
                                </p>
                            </div>
                        </div>
                        <div class="text-sm text-left py-4 px-4">
                            <label for="country"><span class="text-sm px-2">Country:</span></label>
                            <input
                                class="flex h-8 w-56 row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text"
                                id="country"
                                v-model="form.country"
                                @input="updatedFields.country = true"
                            />
                            <div v-show="form.errors.country">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.country }}
                                </p>
                            </div>
                        </div>

                        <div class="text-sm text-left py-4 px-4">
                            <label for="ethnicity"
                                ><span class="text-sm px-2">Ethnicity:</span></label
                            >
                            <input
                                class="flex h-8 w-56 row bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                                type="text"
                                id="ethnicity"
                                v-model="form.ethnicity"
                                @input="updatedFields.ethnicity = true"
                            />
                            <div v-show="form.errors.ethnicity">
                                <p class="text-sm my-2 text-red-500 w-60">
                                    {{ form.errors.ethnicity }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center w-44 m-auto">
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
