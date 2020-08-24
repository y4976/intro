import * as mutations from './mutations';
import communicator from "@/models/Communicator";

export const INITIALIZE_STORE = 'INITIALIZE_STORE';

export const LOAD_USER = 'LOAD_USER';
export const ADD_ITEM = 'ADD_ITEM';
export const SET_ITEM = 'SET_ITEM';

export default {
    [LOAD_USER] ({ commit, state }) {
        commit(mutations.SET_IS_LOADING, true);
        communicator.sendRequest('GetUser', [state.views],
            function(response) {
                commit(mutations.SET_ITEM, response.value);
                commit(mutations.SET_IS_LOADING, false);
            }
        );
    },
}