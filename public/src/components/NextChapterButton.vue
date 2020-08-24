<template>
    <div class="section-footer animation-translate animation-item-3">
        <span v-if="isLastIndex(index)" class="section-next goto-section">
            <span class="section-next-counter">10/10</span>
        </span>

        <router-link v-else :to="menu.path" class="section-next">
            <span class="section-next-counter">{{index}}/10</span>
            <span class="section-next-label">Next chapter</span>
            <span class="section-next-icon"></span>
        </router-link>
    </div>
</template>

<script>
    export default {
        name: "NextChapterButton",
        props: [
            'index', 'animationType'
        ],
        methods: {
            isLastIndex(index) {
                return index == 10;
            },
        },
    }
</script>

<style scoped>

</style>