<script setup>
import SeekerLayout from "@/Layouts/SeekerLayout.vue";
import Details from "@/Pages/Seeker/SeekerComponents/Details.vue";
import Qualifications from "@/Pages/Seeker/SeekerComponents/Qualifications.vue";
import Skill from "@/Pages/Seeker/SeekerComponents/Skill.vue";
import Experiences from "@/Pages/Seeker/SeekerComponents/Experiences.vue";
import Files from "@/Pages/Seeker/SeekerComponents/Files.vue";
import Password from "@/Pages/Seeker/SeekerComponents/Password.vue";

const { seeker } = defineProps({
    seeker: Object,
});
</script>
<template>
    <SeekerLayout>
        <div class="w-full rounded-2xl py-2 m-auto bg-gray-100">
            <div class="my-2 m-auto w-full px-4 py-4 bg-white rounded-md">
                <h1 class="text-xl text-center font-semibold py-4">Seeker Profile</h1>
            </div>
            <!-- Profile Details -->
            <Details :seeker="seeker" />
            <div class="w-full flex flex-wrap justify-center bg-white rounded-md my-2 px-1 py-1">
                <!-- QUALIFICATIONS -->
                <Qualifications :qualifications="seeker.qualifications" />

                <!-- SKILLS -->
                <Skill :skills="seeker.skills" />
            </div>
            <!-- EXPERIENCES -->
            <Experiences :experiences="seeker.experiences" />
            <!-- FILES -->
            <Files :files="{ cv: seeker.cv, visa: seeker.visa, passport: seeker.passport }" />
            <!--Password Update-->
            <Password />
        </div>
    </SeekerLayout>
</template>
