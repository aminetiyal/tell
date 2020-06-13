import Vue from 'vue'


/* FontAwesome */
import {library} from '@fortawesome/fontawesome-svg-core'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
import {
    faUserSecret, faShoppingCart, faArrowRight, faEdit, faTrash, faEye, faMapMarkerAlt, faStar, faStore, faStoreSlash,
    faHome, faLock, faCartPlus, faSearch, faCloudUploadAlt, faClock, faCalendar
} from '@fortawesome/free-solid-svg-icons'

library.add(faUserSecret, faShoppingCart, faCartPlus, faArrowRight, faEdit, faTrash, faEye, faMapMarkerAlt, faStar, faStore,
    faStoreSlash, faHome, faLock, faSearch, faCloudUploadAlt, faClock, faCalendar)
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
import { Datetime } from 'vue-datetime'
import 'vue-datetime/dist/vue-datetime.css'
Vue.component('datetime', Datetime);

import { Settings } from 'luxon'
Settings.defaultLocale = 'en'
