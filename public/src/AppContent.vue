<template>
    <main class="content">
        <div class="container-fluid-limited">
            <div class="row">
                <div class="col col-xl-9" :key="bodyKey">
                    <section class="section section-sub-header animation interaction-in">
                        <div class="section-body">
                            <router-view :key="uri"></router-view>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>

</template>

<script>
    import Home from "@/views/Home";
    import AboutMeList from "@/views/AboutMeList";
    import SkillList from "@/views/SkillList";
    import Facts from "@/views/FactList";
    import ExperienceList from "@/views/ExperienceList";
    import References from "@/views/References";
    import ProjectList from "@/views/ProjectList";
    import Testimonials from "@/views/Testimonials";
    import Contact from "@/views/Contact";

    export default {
        name: 'AppContent',
        components: {
            Home,
            AboutMeList,
            SkillList,
            Facts,
            ExperienceList,
            References,
            ProjectList,
            Testimonials,
            Contact,
        },
        data() {
            return {
                bodyKey: 0,
            }
        },
        computed: {
            uri() {
                return this.$route.fullPath;
            },
        }
    }
</script>

<style scoped>

</style>