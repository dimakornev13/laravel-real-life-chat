import Vue from 'vue';
import Vuex from 'vuex';

import getters from './store/getters';
import actions from './store/actions';
import mutations from './store/mutations';

import contactList from './modules/contactList';
import conversation from './modules/conversation';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        user: null,
        messages: []
    },
    getters,
    actions,
    mutations,
    modules:{
        contactList, conversation
    }
});