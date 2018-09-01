Nova.booting((Vue, router) => {
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
