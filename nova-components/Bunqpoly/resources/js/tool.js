import Echo from "laravel-echo";
import Pusher from 'pusher-js';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faSpinner, faCheck, faTimes } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

try {
    window.$ = window.jQuery = require('jquery');
    require('bootstrap');
} catch (e) {}

Nova.booting((Vue, router) => {
    Vue.component('font-awesome-icon', FontAwesomeIcon);

    library.add(faSpinner, faCheck, faTimes);

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: 'e328fb9386d751925520',
        cluster: 'eu',
        encrypted: true
    });

    router.addRoutes([
        {
            name: 'bunqpoly',
            path: '/bunqpoly',
            component: require('./components/GameIndex'),
        },
        {
            name: 'bunqpoly-create',
            path: '/bunqpoly/create',
            component: require('./components/GameCreate'),
        },
        {
            name: 'bunqpoly-join',
            path: '/bunqpoly/join/:id',
            component: require('./components/GameJoin'),
        },
        {
            name: 'bunqpoly-game',
            path: '/bunqpoly/game/:id',
            component: require('./components/Game'),
        }
    ])
})
