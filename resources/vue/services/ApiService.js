export default {
    get(resource) {
        return axios.get(resource)
    },

    post(resource, data) {
        return axios.post(resource, data)
    },

    put(resource, data) {
        return axios.put(resource, data)
    },

    patch(resource, data) {
        return axios.patch(resource, data)
    },

    delete(resource) {
        return axios.delete(resource)
    }
}