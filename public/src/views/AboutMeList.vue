<template>
    <div class="row">
        <div class="col col-xl-10">
            <h2 class="section-title animation-translate-overline animation-item-1">About me</h2>
            <article class="article animation-translate animation-item-2">
                <div v-for="item in itemList" style="padding-top: 5rem">
                    <div>{{item.title}}</div>
                    <div v-html="item.description" class="pt-3 small-text"></div>
                </div>
            </article>
        </div>
    </div>
</template>

<script>
    import ItemList from "@/mixins/ItemList";

    export default {
        name: "AboutMeList",
        mixins: [ItemList],
    }
</script>

<style scoped>

</style>