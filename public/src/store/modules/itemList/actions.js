import * as mutations from './mutations';
import communicator from "@/models/Communicator";
import swal from 'sweetalert';

export const INITIALIZE_STORE = 'INITIALIZE_STORE';

export const LOAD_DATA = 'LOAD_DATA';
export const CHANGE_PAGE = 'CHANGE_PAGE';
export const CHANGE_SEARCH_CONDITIONS = 'CHANGE_SEARCH_CONDITIONS';
export const DELETE_ITEM = 'DELETE_ITEM';

export default {
    [INITIALIZE_STORE] ({ commit, dispatch }, data) {
        commit(mutations.INITIALIZE_STORE, data);
    },

    [LOAD_DATA] ({ commit, state }) {
        commit(mutations.SET_IS_LOADING, true);
        communicator.sendRequest('GetItemList', [state.views],
            function(response) {
                if (response.result == 200) {
                    commit(mutations.SET_ITEM_LIST, response.value);
                    state.loadCallback();
                } else {
                    alert(response.resultMessage);
                }

                commit(mutations.SET_IS_LOADING, false);
            }
        );
    },

    [CHANGE_PAGE] ({ commit, dispatch }, pageIndex) {
        commit(mutations.SET_PAGE_INDEX, pageIndex);
        dispatch(LOAD_DATA);
    },

    [CHANGE_SEARCH_CONDITIONS] ({ commit, dispatch }, conditions) {
        commit(mutations.SET_SEARCH_CONDITIONS, conditions);
        dispatch(LOAD_DATA);
    },

    [DELETE_ITEM] ({ state, commit, dispatch }, item) {
        swal({
            text: "정말 삭제하시겠습니까?",
            icon: "warning",
            buttons: {
                cancel: {
                    text: "Cancel",
                    value: null,
                    visible: true,
                    className: 'btn-default',
                    closeModal: true,
                },
                confirm: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "btn-default",
                    closeModal: true
                }
            },
            dangerMode: true,
        }).then((ok) => {
            if (ok) {
                communicator.sendActionRequest('DeleteItem', [state.views, {id: item.id}], () => dispatch(LOAD_DATA));
            }
        });
    },
}