export const INITIALIZE_STORE = 'INITIALIZE_STORE';
export const SET_ITEM_LIST = 'SET_ITEM_LIST';
export const SET_PAGE_INDEX = 'SET_PAGE_INDEX';
export const SET_SEARCH_CONDITIONS = 'SET_SEARCH_CONDITIONS';
export const SET_IS_LOADING = 'SET_IS_LOADING';

export default {
    [INITIALIZE_STORE] (state, {itemName, orderField, conditions, pageIndex, perPage, loadCallback, searchColumnList}) {
        state.views.itemName = itemName;

        state.views.conditions = conditions;
        state.views.orderField = orderField;
        state.views.orderType = 'desc';
        state.views.pageIndex = pageIndex;
        state.views.perPage = perPage;
        state.views.startIndex = pageIndex * perPage;
        state.views.searchColumnList = searchColumnList;
        state.loadCallback = loadCallback;
    },

    [SET_ITEM_LIST] (state, {totalCount, itemList, extraData}) {
        state.totalCount = totalCount;
        state.itemList = itemList;
        state.extraData = extraData;
    },

    [SET_PAGE_INDEX] (state, pageIndex) {
        state.views.pageIndex = pageIndex;
        state.views.startIndex = pageIndex * state.views.perPage;
    },

    [SET_SEARCH_CONDITIONS] (state, conditions) {
        state.views.conditions = conditions;
    },

    [SET_IS_LOADING] (state, isLoading) {
        state.isLoading = isLoading;
    },
}