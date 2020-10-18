<template>
    <div>
        <h2 class="section-title animation-translate-overline animation-item-1">Project</h2>
        <div class="animation-translate animation-item-2">
            <div v-for="project in itemList">
                <router-link :to="'/projects/'+project.id">
                    <h3 class="card-title">{{project.title}}</h3>
                </router-link>
                <h4 class="card-subtitle mb-0">{{project.subtitle}}</h4>
                <span class="pr-1" v-for="(skill, index) in project.skillList"><b-badge variant="primary">{{skill.skill}}</b-badge></span>
                <div class="row mt-2">
                    <div class="col-3">
                        <p class="card-tags">{{project.position}}</p>
                        <p>{{project.duration}}</p>
                    </div>
                    <div class="col-9">
                        <ul>
                            <li v-for="description in project.descriptionList">{{description.description}}</li>
                        </ul>
                    </div>
                </div>
                <div class="divider"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import ItemList from "@/mixins/ItemList";

    export default {
        name: "ProjectList",
        mixins: [ItemList],
    }
</script>

<style scoped>
    img {
        height: 194px !important;
        opacity: 1 !important;
    }
</style>