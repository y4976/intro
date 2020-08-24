import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.use(BootstrapVue);

import CommonUtil from '@/plugins/CommonUtil';
Vue.use(CommonUtil);

import DateUtil from '@/plugins/DateUtil';
Vue.use(DateUtil);

import App from "./App.vue";
import store from './store';
import router from './router';

new Vue({
    el: '#app',
    store,
    router,
    render: h => h(App)
});