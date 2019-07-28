const state = {
    messages: [],
    current: {
        id: 0
    }
};

const getters = {};

const actions = {
    sendMessageA: ({dispatch, commit, state}, payload) => {
        if (payload === '')
            return;

        axios.post(`/api/conversation/send/${state.current.id}`, {
            msg: payload
        }).then((response) => {
            commit('setMessageM', response.data)
        }).then(() => {
            dispatch('scrollBottom')
        })
    },

    startConversation: ({dispatch, commit}, contact) => {

        axios.get(`/api/conversation/${contact.id}`)
            .then((response) => {
                commit('setMessagesM', response.data);
                commit('setCurrentM', contact)
            }).then(() => {
            dispatch('scrollBottom')
        })
    },

    incomingMessage: ({dispatch, commit, state}, incomingMessage) => {
        if(state.current.id !== 0 && incomingMessage.from === state.current.id){
            commit('setMessageM', incomingMessage);
            dispatch('scrollBottom');
            return;
        }
    },

    scrollBottom: () => {
        setTimeout(() => {
            document.getElementById('msgWrapper').scrollTop = document.getElementById('msgWrapper').scrollHeight;
        }, 50);
    }
};

const mutations = {
    setMessageM: (state, payload) => {
        state.messages.push(payload);
    },

    setMessagesM: (state, payload) => {
        state.messages = payload
    },

    setCurrentM: (state, payload) => {
        state.current = payload
    }
};


export default {
    // namespaced: true,
    state,
    mutations,
    actions,
    getters
}