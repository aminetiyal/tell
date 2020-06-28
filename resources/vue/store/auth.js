import router from "../router";
import authService from "../services/AuthService"

const baseUrl = window.Laravel.routes['api.tell.base'];

function redirectHome() {
    if (router.currentRoute.name !== 'posts.index') {
        router.push({
            name: 'posts.index'
        });
    }
}

const authModule = ({
    state: {
        user: Laravel.user || null,
        authenticated: Laravel.authenticated || false,
        errors: null
    },
    getters: {
        getUser(state) {
            return state.user;
        },
        isAuth(state) {
            return state.authenticated;
        },
        getErrors(state) {
            return state.errors;
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
        SET_ERRORS(state, errors) {
            state.errors = errors;
        },
        CLEAR_ERRORS(state) {
            state.errors = null;
        }
    },
    actions: {
        login({
            commit
        }, credentials) {
            authService.login(credentials)
                .then(response => {
                    commit('SET_USER', response.data);
                    redirectHome();
                })
                .catch(error => {
                    commit('SET_ERRORS', error.response.data.errors);
                    console.log(error.response.data.errors);
                });
        },
        logout({
            commit
        }) {
            axios.post(baseUrl + '/logout')
                .then(response => {
                    commit('CLEAR_USER');
                    redirectHome();
                })
                .catch(error => {
                    console.log(error);
                })
        },
        fetchUser({
            commit
        }) {
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
