import api from './ApiService'

export default {
    index(search = "") {
        return api.get('tags' + '?search=' + search);
    },
    store(data) {
        return api.post('tags', data);
    },
    update(tag , data) {
        return api.put('tags/' + tag , data);
    },
    delete(tag) {
        return api.delete('tags/' + tag);
    },
    posts(tag, page = 1, search = "") {
        return api.get('tags/' + tag + '/posts' + '?page=' + page + '&search=' + search);
    }
}
