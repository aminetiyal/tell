import Vue from 'vue'


/* FontAwesome */
import {
    library
} from '@fortawesome/fontawesome-svg-core'
import {
    FontAwesomeIcon
} from '@fortawesome/vue-fontawesome'
import {
    faUserSecret,
    faShoppingCart,
    faArrowRight,
    faEdit,
    faTrash,
    faEye,
    faMapMarkerAlt,
    faStar,
    faStore,
    faStoreSlash,
    faHome,
    faLock,
    faCartPlus,
    faSearch,
    faCloudUploadAlt,
    faClock,
    faCalendar,
    faTags
} from '@fortawesome/free-solid-svg-icons'
import {
    faTwitter, faFacebook, faLinkedin
} from '@fortawesome/free-brands-svg-icons'

library.add(faUserSecret, faShoppingCart, faCartPlus, faArrowRight, faEdit, faTrash, faEye, faMapMarkerAlt, faStar, faStore,
    faStoreSlash, faHome, faLock, faSearch, faCloudUploadAlt, faClock, faCalendar, faTags, faTwitter, faFacebook, faLinkedin)
Vue.component('font-awesome-icon', FontAwesomeIcon)


/* SweetAlert */
import VueSwal from 'vue-swal'
Vue.use(VueSwal)

/* InfiniteLoading */
import InfiniteLoading from 'vue-infinite-loading';
Vue.use(InfiniteLoading, {
    props: {
        spinner: 'waveDots'
    },
    system: {
        throttleLimit: 50
    }
});

/* CKEditor */
import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.use(CKEditor);

/* MultiSelect */
import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect)

/* VueTimeago */
import VueTimeago from 'vue-timeago';
Vue.use(VueTimeago, {
    name: 'Timeago', // Component name, `Timeago` by default
    locale: 'en', // Default locale
    // We use `date-fns` under the hood
    // So you can use all locales from it
    locales: {
        // 'zh-CN': require('date-fns/locale/zh_cn'),
    }
})

/* vue-datetime */
import {
    Datetime
} from 'vue-datetime'
import 'vue-datetime/dist/vue-datetime.css'
Vue.component('datetime', Datetime);
import {
    Settings
} from 'luxon'
Settings.defaultLocale = 'en'

/* Vue FilePond */
import vueFilePond from 'vue-filepond';
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

// Create component
const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview);
Vue.component('file-pond', FilePond);

/* VueSocialSharing */
import VueSocialSharing from 'vue-social-sharing'
Vue.use(VueSocialSharing);


/* VueMeta */
// import VueMeta from 'vue-meta'
// Vue.use(VueMeta)
