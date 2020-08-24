<template>
    <header class="header">
        <div class="container-fluid-limited d-flex align-items-center justify-content-between">
            <a href="/" class="header-brand">
<!--                <img src="../assets/img/logo_b.svg" alt="Your logo">-->
            </a>
            <button class="sections-nav-toggler" aria-label="Toggle navigation">
                <span class="sections-nav-toggler-bar"></span>
                <span class="sections-nav-toggler-bar"></span>
                <span class="sections-nav-toggler-bar"></span>
                <span class="sections-nav-toggler-bar"></span>
            </button>
        </div>
    </header>
</template>

<script>
    // import * as sessionStore from '@/store/modules/session';
    // import * as sessionActions from '@/store/modules/session/actions';
    // import * as sessionGetters from '@/store/modules/session/getters';

    export default {
        name: 'AppHeader',
        data() {
            return {

            }
        },
        methods: {
            // ...sessionStore.mapActions({
            //     logOut: sessionActions.LOG_OUT,
            // }),
        },

        computed: {
            // ...sessionStore.mapGetters({
            //     isLoggedIn: sessionGetters.IS_LOGGED_IN
            // }),
        }
    }
</script>

<style scoped>

</style>