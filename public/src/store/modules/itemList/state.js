export default {
    itemList: [],
    totalCount: 0,
    extraData: {},
    loadCallback: () => {},

    isLoading: false,

    views: {
        itemName: '',

        pageIndex: 0,
        perPage: 20,
        startIndex: 0,
        orderField: '',
        orderType: 'desc',
        conditions: {},
        searchColumnList: [],
    }
};
