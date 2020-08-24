export const SET_IS_LOADING = 'SET_IS_LOADING';
export const SET_ITEM = 'SET_ITEM';

export default {
    [SET_IS_LOADING] (state, isLoading) {
        state.isLoading = isLoading;
    },

    [SET_ITEM] (state, {item}) {
        state.user = item;
    },
}