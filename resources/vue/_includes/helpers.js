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

        /** Read browser cookies by name */
        readCookie(name) {
            var match = document.cookie.match(
                new RegExp("(^|;\\s*)(" + name + ")=([^;]*)")
            );
            return match ? decodeURIComponent(match[3]) : null;
        },

        /**
         * @param {Array} array: Array to be filtred
         * @param {callback} callback: filtering condition e.g below
         *  (item, duplicatedItem) => item.slug == duplicatedItem.slug
         */
        uniqueArrayOfObjects(array, callback) {
            return array.reduce((filtred, item) => {
                if (!filtred.some(duplicatedItem => callback(item, duplicatedItem))) {
                    filtred.push(item);
                }
                return filtred;
            }, []);
        },


        readingTime(text) {
            let minutes = 0;
            const contentString = JSON.stringify(text);
            const words = contentString.split(" ").length;
            const wordsPerMinute = 200;
            minutes = Math.ceil(words / wordsPerMinute);
            return minutes + ' min read';
        }
    }
};

Vue.mixin(Helpers);
