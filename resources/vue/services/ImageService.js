import api from './ApiService'

export default {
    show(image) {
        return api.get('images/' + JSON.stringify(image));
    },
    delete(image) {
        return api.delete('images/' + JSON.stringify(image));
    }
}
