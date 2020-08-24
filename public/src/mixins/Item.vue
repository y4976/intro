<script>
    import * as itemStore from '@/store/modules/item';
    import CommonStore from "@/mixins/CommonStore";

    export default {
        name: 'Item',
        extends: CommonStore,

        created() {
            this.storeName = this.getValidStoreName();
            this.registerStoreModule();
        },

        mounted() {
            this.initialize();
            this.loadData();
        },

        data() {
            return {
                itemName: this.$options.name,
                store: itemStore,

                item: {},
                id: this.$route.params.id,
                conditions: {},
            }
        },

        methods: {
            initialize() {
                this.initializeStore({
                    itemName: this.itemName,
                    id: this.id,
                    loadCallback: this.loadCallback,
                    addCallback: this.addCallback,
                    setCallback: this.setCallback,
                    conditions: this.conditions,
                });
            },

            initializeStore(data) {
                this.$store.dispatch(this.storeName + '/default/INITIALIZE_STORE', data);
            },

            loadData() {
                this.$store.dispatch(this.storeName + '/default/LOAD_DATA', this.loadCallback);
            },

            addItem() {
                this.$store.dispatch(this.storeName + '/default/ADD_ITEM', this.item);
            },

            setItem() {
                this.$store.dispatch(this.storeName + '/default/SET_ITEM', this.item);
            },

            loadCallback(item) {
                this.item = $.extend(true, {}, item);
                console.log(item);
            },

            addCallback() {

            },

            setCallback() {
                this.loadData();
            }
        },

        computed: {
            isLoading() {
                return (this.$store.state[this.storeName].default.isLoading) ? 'sk-loading': '';
            },
        },
    }
</script>