<script setup>
import SeekerLayout from "@/Layouts/SeekerLayout.vue";
import Details from "@/Pages/Seeker/SeekerComponents/Details.vue";
import Qualifications from "@/Pages/Seeker/SeekerComponents/Qualifications.vue";
import Skill from "@/Pages/Seeker/SeekerComponents/Skill.vue";
import Experiences from "@/Pages/Seeker/SeekerComponents/Experiences.vue";
import Files from "@/Pages/Seeker/SeekerComponents/Files.vue";
import Password from "@/Pages/Seeker/SeekerComponents/Password.vue";
import { useToast } from "vue-toastification";

const toast = useToast()

const { seeker, message } = defineProps({
    seeker: Object,
    message: Object,
});
if (message) {
    toast.success(message)
    console.log("MESSAGE", message.detail);
}
</script>
<template>
    <!-- <div v-show="message" class="animate-bounce repeat-2 absolute top-20 right-20 w-96 h-48 bg-blue-500">
        UPDATE SUCCESFUL
    </div> -->

    <SeekerLayout>
        <div class="max-sm:w-[99%] rounded-md py-2 bg-gray-100">
            <div class="my-2 m-auto w-full px-4 py-4 bg-white rounded-md">
                <h1 class="text-xl text-center font-semibold py-4">Seeker Profile</h1>
            </div>
            <!-- Profile Details -->
            <Details :seeker="seeker" />

            <div class="w-full flex flex-wrap justify-around bg-white rounded-md my-2 px-1 py-1">
                <!-- EXPERIENCES -->
                <Experiences :experiences="seeker.experiences" />

                <!-- QUALIFICATIONS -->
                <Qualifications :qualifications="seeker.qualifications" />
            </div>

            <!-- SKILLS -->
            <Skill :skills="seeker.skills" />
            <!-- FILES -->
            <Files :files="{ cv: seeker.cv, visa: seeker.visa, passport: seeker.passport }" />
            <!--Password Update-->
            <Password />
        </div>
    </SeekerLayout>
</template>
