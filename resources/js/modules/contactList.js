const state = {
    contacts: [],
    current: {
        id: 0
    }
};

const getters = {
    sortedContacts: (state) => {
        return _.sortBy(state.contacts, (contact) => {
            if (contact === state.current) {
                return Infinity;
            }

            return contact.unread;
        }).reverse()
    },
};

const mutations = {

    setContactsM: (state, payload) => {
        state.contacts = payload;
    },

    setCurrentM: (state, payload) => {
        state.current = payload
    }
};

const actions = {
    setContactsA: ({commit}, payload) => {
        commit('setContactsM', payload)
    },

    setCurrentA: ({dispatch, commit}, payload) => {

        commit('setCurrentM', payload);
        dispatch('updateUnread', {contact: payload, reset: true})
            .then(() => {
                dispatch('startConversation', payload)
            })
    },

    // payload = { contact, reset }
    updateUnread: ({commit, state}, payload) => {

        const contacts = state.contacts.map((single) => {
            if (single.id !== payload.contact.id)
                return single;

            single.unread = payload.reset ? 0 : single.unread + 1;

            return single
        });

        commit('setContactsM', contacts)
    },

    updateUnreadIncomingMessage: ({dispatch, state}, message) => {
        let contact = state.contacts.filter((single) => {
            return single.id === message.from;
        })[0];

        dispatch('updateUnread', {contact: contact})
    }
};


export default {
    // namespaced: true,
    state,
    mutations,
    actions,
    getters
}