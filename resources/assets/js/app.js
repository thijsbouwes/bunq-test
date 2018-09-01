import Vue from 'vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faSpinner } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

require('./bootstrap');

library.add(faSpinner);

Vue.config.productionTip = false;

Vue.component('complete-account', require('./components/CompleteAccount.vue'));
Vue.component('font-awesome-icon', FontAwesomeIcon);

const app = new Vue({
    el: '#app'
});

$(function(){
    dice_initialize(document.body);
});
