import { createNamespacedHelpers } from 'vuex';

import state from "./state";
import getters from "./getters";
import actions from './actions';
import mutations from './mutations';

const NAMESPACE = 'item';
const { mapState, mapGetters, mapActions } = createNamespacedHelpers(NAMESPACE);

export { mapState, mapGetters, mapActions };

export default {
    namespaced: true,
    state() {
        return $.extend(true, {}, state)
    },
    actions,
    mutations,
    getters,
}