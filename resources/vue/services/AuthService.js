import api from './ApiService'

export default {
    login(user) {
        return api.post('login', user);
    },
    logout() {
        return api.post('logout');
    }
}
