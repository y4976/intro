<template>
    <div>
        <h2 class="section-title animation-translate-overline animation-item-1">Project</h2>
        <div class="row animation-translate animation-item-2">
            <div v-for="project in itemList" class="col-12 col-md-4 pt-4">
                <router-link :to="'/projects/'+project.id">
                    <img class="card-img-top" :src="'assets/img/projects/'+project.id+'/preview.png'">
                </router-link>
                <div class="card-body">
                    <router-link :to="'/projects/'+project.id">
                        <h3 class="card-title">{{project.title}}</h3>
                    </router-link>
                    <h4 class="card-subtitle">{{project.subtitle}}</h4>
                    <p class="card-tags">{{project.position}}</p>
                </div>
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