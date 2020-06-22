import api from './ApiService'

export default {
    post(image) {
        return api.post('images', image);
    },
    show(image) {
        return api.get('images/' + JSON.stringify(image));
    },
    delete(image) {
        return api.delete('images/' + image);
    }
}
