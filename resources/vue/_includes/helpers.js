import Vue from 'vue';

const Helpers = {

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
    }
};

Vue.mixin(Helpers);