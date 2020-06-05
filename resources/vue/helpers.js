import axios from 'axios';

export default {

    methods: {
        /** Truncate the given string.*/
        truncate(string, length = 70) {
            return _.truncate(string, {
                'length': length,
                'separator': /,? +/
            });
        },

        /** Convert string to slug. src: https://gist.github.com/mathewbyrne/1280286 */
        slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-');
        },
        
        /** Create an instance of axios. */
        http() {
            let instance = axios.create();

            instance.defaults.baseURL = '/' + Wink.path;

            instance.interceptors.response.use(
                response => response,
                error => {
                    switch (error.response.status) {
                        case 500:
                            Bus.$emit('httpError', error.response.data.message);
                            break;

                        case 401:
                            window.location.href = '/' + Wink.path + '/logout';
                            break;
                    }

                    return Promise.reject(error);
                }
            );

            return instance;
        },
    }
};