import api from './ApiService'

export default {
    login(user) {
        return api.post('login', user);
    }
}
