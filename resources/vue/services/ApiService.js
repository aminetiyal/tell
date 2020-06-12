export default {

    prefix() {
        // getting the api base path
        let baseUrl = window.Laravel.routes['api.tell.base'];

        // add "/" at the end of the path if doesn't end with it
        if(!baseUrl.endsWith("/")) {
            baseUrl += "/";
        }
        
        return baseUrl;
    },

    get(endpoint) {
        return axios.get(this.prefix() + endpoint)
    },

    post(endpoint, data) {
        return axios.post(this.prefix() + endpoint, data)
    },

    put(endpoint, data) {
        return axios.put(this.prefix() + endpoint, data)
    },

    patch(endpoint, data) {
        return axios.patch(this.prefix() + endpoint, data)
    },

    delete(endpoint) {
        return axios.delete(this.prefix() + endpoint)
    }
}
