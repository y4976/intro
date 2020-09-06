<template>
    <div>
        <app-header/>
        <app-nav/>
        <app-content/>

        <div id="appInfo">
            <b-button v-if="isDevelopMode" variant="outline-info" v-b-modal.log-modal>Communication Log</b-button>
<!--            version: {{version}}-->
            <log-modal ref="logModal"/>
        </div>
    </div>
</template>

<script>
    import * as userStore from '@/store/modules/user';
    import * as userActions from '@/store/modules/user/actions';

    import LogModal from '@/components/modal/LogModal';
    import AppHeader from "@/AppHeader";
    import AppNav from "@/AppNav";
    import AppContent from "@/AppContent";

    export default {
        name: 'App',
        components: {
            AppContent,
            AppNav,
            AppHeader,
            LogModal,
        },
        created() {
            this.loadUser();
        },
        data() {
            return {
                version: require('../package.json').version,
            }
        },
        methods: {
            ...userStore.mapActions({
                loadUser: userActions.LOAD_USER,
            }),
        },
        computed: {
            isDevelopMode() {
                return process.env.NODE_ENV === 'development';
            },
        },
    };
</script>

<style>

</style>

<style scoped>
    #appInfo {
        position: fixed;
        bottom: -3px;
        right: 20px;
    }
</style>