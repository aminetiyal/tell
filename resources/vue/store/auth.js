import router from "../router";

const authModule = ({
    state: {
        user: Laravel.user || null,
        authenticated: Laravel.authenticated || false
    },
    getters: {
        getUser(state) {
            return state.user;
        },
        isAuth(state) {
            return state.authenticated;
        }
    },
    mutations: {
        SET_USER(state, user) {
            state.user = user;
            state.authenticated = true;
        },
        CLEAR_USER(state, user) {
            state.user = null;
            state.authenticated = false;
        },
    },
    actions: {
        login({commit, dispatch}, credentials) {
            axios.post('/login', credentials)
                .then(response => {
                    commit('SET_USER', response.data.data)
                    router.push({name: 'home'})
                })
                .catch(error => {
                    console.log(error.response.data.errors);
                })
        },
        logout({commit}) {
            axios.post('/logout')
                .then(response => {
                    commit('CLEAR_USER');
                    router.push({name: 'login'});
                })
                .catch(error => {
                    commit('CLEAR_USER');
                    router.push({name: 'login'});
                    console.log(error.response.data.errors);
                })
        },
        fetchUser({commit}) {
            axios.get('/api/user')
                .then(response => {
                    commit('SET_USER', response.data.data);
                })
                .catch(error => {
                    commit('CLEAR_USER');
                });
        }
    },
    modules: {}
})

export default authModule;
