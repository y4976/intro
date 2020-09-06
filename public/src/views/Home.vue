<template>
    <div class="jumbotron jumbotron-fluid pt-6 pt-lg-8 pb-0 mb-0">
        <img src="assets/img/avatar.png" class="jumbotron-img animation-translate animation-item-1" alt="Avatar">
        <h2 class="display-1 display-animated display-animated-in animation-translate animation-item-2">
            {{user.name}}
            <small style="font-size: 40px">Choi seunghoon</small>
        </h2>
        <div class="lead animation-translate animation-item-3" v-html="user.brief"></div>
    </div>
</template>

<script>
    import User from "@/mixins/User";

    export default {
        name: "Home",
        mixins: [User],
    }
</script>

<style scoped>

</style>