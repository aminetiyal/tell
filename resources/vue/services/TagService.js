import api from './ApiService'

export default {
    index() {
        return api.get('/tags');
    }
}