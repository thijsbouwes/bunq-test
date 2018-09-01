import Echo from "laravel-echo";
import Pusher from 'pusher-js';

Nova.booting((Vue, router) => {
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
        }
    ])
})
