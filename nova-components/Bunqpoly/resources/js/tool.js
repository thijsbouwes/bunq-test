Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'bunqpoly',
            path: '/bunqpoly',
            component: require('./components/Tool'),
        },
    ])
})
