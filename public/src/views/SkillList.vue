<template>
    <div>
        <h2 class="section-title animation-translate-overline animation-item-1">Skill</h2>
        <div class="row animation-translate animation-item-2 m-0">
            <div class="pl-3" v-for="(item, index) in itemList">
                <h5><b-badge variant="primary">{{item.skill}}</b-badge></h5>
            </div>
        </div>
    </div>
</template>

<script>
    import ItemList from "@/mixins/ItemList";

    export default {
        name: "SkillList",
        mixins: [ItemList],
    }
</script>

<style scoped>

</style>