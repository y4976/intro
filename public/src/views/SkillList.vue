<template>
    <div>
        <h2 class="section-title animation-translate-overline animation-item-1">Skill</h2>

        <div class="animation-translate animation-item-2 m-0">
            <div class="pt-3"><strong>Front-End</strong></div>
            <div class="row ml-0">
                <h5 class="ml-2" v-for="skill in extraData.frontEndList"><b-badge variant="primary">{{skill}}</b-badge></h5>
            </div>
            <div class="pt-3"><strong>Back-End</strong></div>
            <div class="row ml-0">
                <h5 class="ml-2" v-for="skill in extraData.backEndList"><b-badge variant="primary">{{skill}}</b-badge></h5>
            </div>
            <div class="pt-3"><strong>Database</strong></div>
            <div class="row ml-0">
                <h5 class="ml-2" v-for="skill in extraData.databaseList"><b-badge variant="primary">{{skill}}</b-badge></h5>
            </div>
            <div class="pt-3"><strong>Delphi App</strong></div>
            <div class="row ml-0">
                <h5 class="ml-2" v-for="skill in extraData.delphiList"><b-badge variant="primary">{{skill}}</b-badge></h5>
            </div>
            <div class="pt-3"><strong>Etc. </strong></div>
            <div class="row ml-0">
                <h5 class="ml-2" v-for="skill in extraData.etcList"><b-badge variant="primary">{{skill}}</b-badge></h5>
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