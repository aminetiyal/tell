import api from './ApiService'

export default {
    index(page = 1, search = "") {
        return api.get('/api/tell/posts' + '?page=' + page + '&search=' + search);
    },
    show(post) {
        return api.get('/api/tell/posts/' + post);
    },
    store(data) {
        return api.post('/api/tell/posts', data);
    },
    update(post, data) {
        return api.put('/api/tell/posts/' + post, data);
    }
}