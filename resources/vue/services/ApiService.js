export default {
    prefix: '/api/' + window.Laravel.prefix,

    get(endpoint) {
        return axios.get(this.prefix + endpoint)
    },

    post(endpoint, data) {
        return axios.post(this.prefix + endpoint, data)
    },

    put(endpoint, data) {
        return axios.put(this.prefix + endpoint, data)
    },

    patch(endpoint, data) {
        return axios.patch(this.prefix + endpoint, data)
    },

    delete(endpoint) {
        return axios.delete(this.prefix + endpoint)
    }
}
