import Vue from 'vue'


/* FontAwesome */
import {library} from '@fortawesome/fontawesome-svg-core'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
import {
    faUserSecret, faShoppingCart, faArrowRight, faEdit, faTrash, faEye, faMapMarkerAlt, faStar, faStore, faStoreSlash,
    faHome, faLock, faCartPlus, faSearch, faCloudUploadAlt
} from '@fortawesome/free-solid-svg-icons'

library.add(faUserSecret, faShoppingCart, faCartPlus, faArrowRight, faEdit, faTrash, faEye, faMapMarkerAlt, faStar, faStore,
    faStoreSlash, faHome, faLock, faSearch, faCloudUploadAlt)
Vue.component('font-awesome-icon', FontAwesomeIcon)


/* SweetAlert */
import VueSwal from 'vue-swal'
Vue.use(VueSwal)

/* InfiniteLoading */
import InfiniteLoading from 'vue-infinite-loading';
Vue.use(InfiniteLoading,  {
    props: {spinner: 'waveDots'},
    system: {throttleLimit: 50}
});

/* CKEditor */
import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.use( CKEditor );

/* MultiSelect */
import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect)