import api from './ApiService'

export default {
    index(search = "") {
        return api.get('tags' + '?search=' + search);
    },
    posts(tag, page = 1, search = "") {
        return api.get('tags/' + tag + '/posts' + '?page=' + page + '&search=' + search);
    }
}
