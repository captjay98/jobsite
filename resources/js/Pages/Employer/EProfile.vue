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
        <div class="py-4 m-auto w-full bg-gray-100 rounded-md">
            <div class="py-4 px-4 mt-4 mb-8 w-full bg-white rounded-md">
                <h1 class="py-4 text-xl font-semibold text-center">
                    Employer Details
                </h1>
            </div>
            <div class="bg-white my-8 w-[99%] m-auto rounded-md">
                <form class="pb-8 my-8 rounded-md">
                    <div class="flex justify-center pt-12 pb-4 my-4 mx-4 align-middle">
                        <h1 class="m-auto w-36 h-36 bg-blue-300 rounded-full">
                            <img class="w-full h-full" :src="'/storage/' + seeker.user.avatar" alt="Seeker Avatar" />
                        </h1>
                    </div>

                    <div
                        class="flex flex-wrap my-4 m-auto justify-around w-full md:w-[70%] lg:w-[50%] xl:w-[40%] rounded-md">
                        <div class="py-4 px-1 text-left max-sm:w-[140px]">
                            <label for="firstname"><span class="px-2 text-[12px]">First Name:</span></label>
                            <input
                                class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-2xl row text-[13px] border-inherit"
                                type="text" id="firstname" v-model="form.firstname"
                                @input="changedFields.firstname = true" />
                            <div v-show="form.errors.firstname">
                                <p class="my-2 text-sm text-red-500">
                                    {{ form.errors.firstname }}
                                </p>
                            </div>
                        </div>
                        <div class="py-4 px-1 text-sm text-left max-sm:w-[140px]">
                            <label for="lastname"><span class="px-2 text-[12px]">Last Name:</span></label>
                            <input
                                class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-2xl row text-[13px] border-inherit"
                                type="text" id="lastname" v-model="form.lastname" @input="changedFields.lastname = true" />
                            {{ console.log("Form:-", form) }}
                            {{ console.log("Changed:-", changedFields) }}

                            <div v-show="form.errors.lastname">
                                <p class="my-2 text-sm text-red-500">
                                    {{ form.errors.lastname }}
                                </p>
                            </div>
                        </div>
                        <div class="py-4 px-1 text-sm text-left max-sm:w-[140px]">
                            <label for="employer.user.ame"><span class="px-2 text-[12px]">User Name:</span></label>
                            <input
                                class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-2xl text-[13px] row border-inherit"
                                type="text" id="username" v-model="form.username" @input="changedFields.username = true" />
                            <div v-show="form.errors.username">
                                <p class="my-2 text-sm text-red-500">
                                    {{ form.errors.username }}
                                </p>
                            </div>
                        </div>

                        <div class="py-4 px-1 text-sm text-left max-sm:w-[140px]">
                            <label for="email"><span class="px-2 text-[12px]">Email:</span></label>
                            <input
                                class="flex w-full h-8 font-semibold bg-gray-100 rounded-md shadow-2xl text-[13px] row border-inherit"
                                type="text" id="email" v-model="form.email" @input="changedFields.email = true" />
                            <div v-show="form.errors.email">
                                <p class="my-2 text-sm text-red-500">
                                    {{ form.errors.email }}
                                </p>
                            </div>
                        </div>
                        <div class="flex justify-center m-auto mt-4 w-44">
                            <Button class="py-2 px-6 mb-8 text-white bg-blue-500 rounded-md" type="submit">
                                Update
                            </Button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </EmployerLayout>
</template>
