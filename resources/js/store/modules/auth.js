import axios from "axios";

const state = {
    token: localStorage.getItem("access_token") || null
};

const mutations = {
    setToken: function(state, token) {
        state.token = token;
    }
};

const actions = {
    login: async function(context, credencial) {
        const response = await axios.post("/api/login", {
            username: credencial.username,
            password: credencial.password
        });

        localStorage.setItem("access_token", response.data.access_token);
        context.commit("setToken", response.data.access_token);
    }
};

const getters = {};

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
};
