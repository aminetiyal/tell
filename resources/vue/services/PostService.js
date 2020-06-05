import api from './ApiService'

export default {
    index() {
        return api.get('/api/tell/posts');
    },

    show(post) {
        return api.get('/api/tell/posts/'+post);
    },

    store(post) {
        return api.post('/api/tell/posts', post);
    }
}