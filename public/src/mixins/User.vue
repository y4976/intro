<script>
    import * as userStore from '@/store/modules/user';

    export default {
        name: "User",
        computed: {
            ...userStore.mapState({
                user: (state) => state.user,
            }),
        }
    }
</script>