<script setup>
import Button from "@/Components/Button.vue";
import { useForm } from "@inertiajs/vue3";
import { computed } from "vue";

const { seeker } = defineProps({
    seeker: Object,
});

const form = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
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

const updatePassword = () => {
    if (!updatedFields.value.isEmpty) {
        form.put(route("password.update"), { ...updatedFields.value, preserveScroll: true });
    }
    console.log("PASSWORD", updatedFields);
};
</script>
<template>
    <div
        class="w-full flex flex-wrap justify-center bg-white rounded-md my-4 px-2 py-2 border-slate-800"
    >
        <div class="mt-2 m-auto w-[99%] px-4 py-2 bg-white rounded-md">
            <h1 class="text-xl text-left font-semibold py-2">Password Update</h1>
        </div>

        <form class="w-full flex flex-wrap justify-center" @submit.prevent="updatePassword">
            <div class="flex flex-wrap justify-center my-4">
                <div class="my-4 mx-4">
                    <input
                        class="flex bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                        type="text"
                        id="current_password"
                        placeholder="Current Password"
                        v-model="form.current_password"
                        @input="updatedFields.current_password = true"
                    />
                    <div v-show="form.errors.current_password">
                        <p class="text-sm my-2 text-red-500 w-60">
                            {{ form.errors.current_password }}
                        </p>
                    </div>
                </div>
                <div class="my-4 mx-4">
                    <input
                        class="flex bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                        type="text"
                        id="password"
                        placeholder="New Password"
                        v-model="form.password"
                        @input="updatedFields.password = true"
                    />
                    <div v-show="form.errors.password">
                        <p class="text-sm my-2 text-red-500 w-60">
                            {{ form.errors.password }}
                        </p>
                    </div>
                </div>
                <div class="my-4 mx-4">
                    <input
                        class="flex bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                        type="text"
                        id="password_confirmation"
                        placeholder="Confirm Password"
                        v-model="form.password_confirmation"
                        @input="updatedFields.password_confirmation = true"
                    />
                    <div v-show="form.errors.password_confirmation">
                        <p class="text-sm my-2 text-red-500 w-60">
                            {{ form.errors.password_confirmation }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="w-full flex justify-center">
                <!-- <Link -->
                <!--     class="w-64" -->
                <!--     as="button" -->
                <!--     method="put" -->
                <!--     :href="route('password.update')" -->
                <!--     :data="{ -->
                <!--         current_password: passForm.current_password, -->
                <!--         password: passForm.password, -->
                <!--         password_confirmation: passForm.password_confirmation, -->
                <!--     }" -->
                <!-- > -->
                <div class="w-64">
                    <Button>Update Password</Button>
                </div>
                <!-- </Link -->
                <!-- > -->
            </div>
        </form>
    </div>
</template>
