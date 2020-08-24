<template>
    <div>
        <h2 class="section-title animation-translate-overline animation-item-1">{{item.title}}</h2>
        <div class="animation-translate animation-item-2">
            <div class="card-body">
                <h4 class="card-subtitle">{{item.subtitle}}</h4>
                <p class="card-tags">{{item.position}}</p>
                <span class="pr-1" v-for="(skill, index) in item.skillList"><b-badge variant="primary">{{skill.skill}}</b-badge></span>
                <div class="pt-5" v-html="item.description"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import Item from "@/mixins/Item";

    export default {
        name: "Project",
        mixins: [Item],
    }
</script>

<style scoped>

</style>