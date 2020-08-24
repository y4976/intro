import * as mutations from './mutations';
import communicator from "@/models/Communicator";

export const INITIALIZE_STORE = 'INITIALIZE_STORE';

export const LOAD_DATA = 'LOAD_DATA';
export const ADD_ITEM = 'ADD_ITEM';
export const SET_ITEM = 'SET_ITEM';

export default {
    [INITIALIZE_STORE] ({ commit, dispatch }, data) {
        commit(mutations.INITIALIZE_STORE, data);
    },

    [LOAD_DATA] ({ commit, state }, callback) {
        commit(mutations.SET_IS_LOADING, true);
        communicator.sendRequest('GetItem', [state.views],
            function(response) {
                commit(mutations.SET_ITEM, response.value);
                callback(response.value.item);
                commit(mutations.SET_IS_LOADING, false);
            }
        );
    },

    [ADD_ITEM] ({ commit, state }, item) {
        communicator.sendActionRequest('AddItem', [state.views, {item: item}], state.addCallback);
    },

    [SET_ITEM] ({ commit, state, dispatch }, item) {
        communicator.sendActionRequest('SetItem', [state.views, {item: item}], state.setCallback);
    },
}