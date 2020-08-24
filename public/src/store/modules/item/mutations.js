export const INITIALIZE_STORE = 'INITIALIZE_STORE';
export const SET_IS_LOADING = 'SET_IS_LOADING';
export const SET_ITEM = 'SET_ITEM';

export default {
    [INITIALIZE_STORE] (state, {itemName, id, loadCallback, addCallback, setCallback, conditions}) {
        state.loadCallback = loadCallback;
        state.addCallback = addCallback;
        state.setCallback = setCallback;

        state.views.itemName = itemName;
        state.views.id = id;
        state.views.conditions = conditions;
    },

    [SET_IS_LOADING] (state, isLoading) {
        state.isLoading = isLoading;
    },

    [SET_ITEM] (state, {item}) {
        state.item = item;
    },
}