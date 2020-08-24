<template>
    <div>
        <h2 class="section-title animation-translate-overline animation-item-1">Experience</h2>
        <div class="timeline timeline-animated">
            <div v-for="item in itemList" class="timeline-item">
                <span class="timeline-date">{{item.period}}</span>
                <h3 class="timeline-title">{{item.company}}</h3>
                <p class="timeline-text">{{item.position}}</p>
                <div class="timeline-text row m-0 pt-2">
                    <div v-for="(project, index) in item.projectList" class="pr-2">
                        <router-link :to="'/projects/'+project.id">
                            <h5><b-badge class="project-link">{{project.title}}</b-badge></h5>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ItemList from "@/mixins/ItemList";

    export default {
        name: "ExperienceList",
        mixins: [ItemList],
    }
</script>

<style scoped>
    .project-link {
        background-color: #0062cc !important;
    }
</style>