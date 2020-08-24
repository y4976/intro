<script>
    import * as itemListStore from '@/store/modules/itemList';
    import CommonStore from "@/mixins/CommonStore";

    export default {
        name: 'ItemList',
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
                store: itemListStore,

                defaultConditions: {},
                defaultOrderField: '',
                defaultPageIndex: 0,
                defaultPerPage: 20,
                defaultLoadCallback: () => {},

                tabList: [
                    {id: 'all', title: 'All'},
                ],
            }
        },

        methods: {
            initialize() {
                this.initializeStore({
                    itemName: this.itemName,
                    conditions: this.defaultConditions,
                    orderField: this.defaultOrderField,
                    orderType: 'desc',
                    pageIndex: this.defaultPageIndex,
                    perPage: this.defaultPerPage,
                    loadCallback: this.defaultLoadCallback,
                    columnList: this.columnList,
                    searchColumnList: this.searchColumnList
                });
            },

            initializeStore(data) {
                this.$store.dispatch(this.storeName + '/default/INITIALIZE_STORE', data);
            },

            changedSearchInfo(conditions) {
                this.$store.dispatch(this.storeName + '/default/CHANGE_SEARCH_CONDITIONS', conditions);
            },

            loadData() {
                this.$store.dispatch(this.storeName + '/default/LOAD_DATA');
            },
        },

        computed: {
            columnList() {
                return [];
            },

            searchColumnList() {
                return [];
            },

            tab() {
                return this.$store.state[this.storeName].default.views.tab;
            },

            extraData() {
                return this.$store.state[this.storeName].default.extraData;
            },

            itemList() {
                return this.$store.state[this.storeName].default.itemList;
            },

            isLoading() {
                return (this.$store.state[this.storeName].default.isLoading) ? 'sk-loading': '';
            },
        }
    }
</script>
