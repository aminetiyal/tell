import api from './ApiService'

export default {
    index() {
        return api.get('tags');
    },
    posts(tag, page = 1, search = "") {
        return api.get('tags/' + tag + '/posts' + '?page=' + page + '&search=' + search);
    }
}
