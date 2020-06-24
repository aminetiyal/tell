import api from './ApiService'

export default {
    index(page = 1, search = "") {
        return api.get('posts' + '?page=' + page + '&search=' + search);
    },
    show(post) {
        return api.get('posts/' + post);
    },
    store(data) {
        return api.post('posts', data);
    },
    update(post, data) {
        return api.put('posts/' + post, data);
    },
    destroy(post) {
        return api.delete('posts/' + post);
    }
}
