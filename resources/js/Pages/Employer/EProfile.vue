<script setup>
import EmployerLayout from "@/Layouts/EmployerLayout.vue";
import Button from "@/Components/Button.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const { employer } = defineProps({
    employer: Object,
});

const user = {
    firstname: ref(employer.user.firstname),
    lastname: ref(employer.user.lastname),
    username: ref(employer.user.username),
    email: ref(employer.user.email),
};

const form = useForm(user);

const changedFields = ref({});
const updateUser = () => {
    const changes = {};
    for (const key in changedFields.value) {
        if (changedFields.value[key]) {
            changes[key] = form[key];
        }
    }
    console.log("Changes:-", changes);

    form.patch(route("employer.update"), changes, { preserveScroll: true });
    // app.config.globalProperties$toast.success("Data updated successfully");
};
</script>
<template>
    <EmployerLayout>
        <div class="w-full rounded-md py-4 m-auto bg-ray-100">
            <div class="mb-8 mt-4 ml-2 px-4 py-4 bg-white w-[98%] rounded-md">
                <h1 class="text-xl text-left font-semibold py-4">Employer Profile</h1>
            </div>
            <div class="bg-white mx-2 my-8 w-[98%] rounded-md">
                <form class="my-8 rounded-md" @submit.prevent="updateUser">
                    <div class="pt-8 mx-4 my-4 flex align-middle justify-center">
                        <h1 class="h-36 w-36 m-auto bg-blue-300 rounded-full">
                            <img class="w-full h-full" :src="'/storage/icons/avatar.png'" alt="" />
                        </h1>
                    </div>

                    <div
                        class="flex flex-wrap my-8 m-auto justify-center w-[99%] md:w-[90%] lg:w-[50%] rounded-md"
                    >
                        <div class="text-sm text-left py-4 px-4">
                            <label for="firstname"
                                ><span class="text-sm px-2">First Name:</span></label
                            >
                            <input
                                class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="firstname"
                                v-model="form.firstname"
                                @input="changedFields.firstname = true"
                            />
                            <div v-show="form.errors.firstname">
                                <p class="text-sm my-2 text-red-500">
                                    {{ form.errors.firstname }}
                                </p>
                            </div>
                        </div>
                        <div class="text-sm text-left py-4 px-4">
                            <label for="lastname"
                                ><span class="text-sm px-2">Last Name:</span></label
                            >
                            <input
                                class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="lastname"
                                v-model="form.lastname"
                                @input="changedFields.lastname = true"
                            />
                            {{ console.log("Form:-", form) }}
                            {{ console.log("Changed:-", changedFields) }}

                            <div v-show="form.errors.lastname">
                                <p class="text-sm my-2 text-red-500">
                                    {{ form.errors.lastname }}
                                </p>
                            </div>
                        </div>
                        <div class="text-sm text-left py-4 px-4">
                            <label for="username"
                                ><span class="text-sm px-2">User Name:</span></label
                            >
                            <input
                                class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="username"
                                v-model="form.username"
                                @input="changedFields.username = true"
                            />
                            <div v-show="form.errors.username">
                                <p class="text-sm my-2 text-red-500">
                                    {{ form.errors.username }}
                                </p>
                            </div>
                        </div>

                        <div class="text-sm text-left py-4 px-4">
                            <label for="email"><span class="text-sm px-2">Email:</span></label>
                            <input
                                class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="email"
                                v-model="form.email"
                                @input="changedFields.email = true"
                            />
                            <div v-show="form.errors.email">
                                <p class="text-sm my-2 text-red-500">
                                    {{ form.errors.email }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center w-64 m-auto">
                        <Button
                            class="mb-8 bg-blue-500 text-white px-6 py-2 rounded-md"
                            type="submit"
                        >
                            Update
                        </Button>
                    </div>
                </form>
            </div>
        </div>
    </EmployerLayout>
</template>
