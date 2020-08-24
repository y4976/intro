<script>
    export default {
        name: 'CommonStore',
        data() {
            return {
                storeName: '',
                store: null,
            }
        },

        methods: {
            registerStoreModule() {
                this.$store.registerModule(this.storeName, {
                    modules: this.store,
                    namespaced: true
                });
            },

            getValidStoreName() {
                let storeName = this.$options.name;
                while (true) {
                    if (this.$store.state[storeName]) {
                        storeName += '_';
                    } else {
                        break;
                    }
                }

                return storeName;
            },
        },
    }
</script>
