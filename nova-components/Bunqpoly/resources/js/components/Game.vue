<template>
    <div>
        <div class="flex justify-between">
            <div class="relative h-9 mb-6">
                <heading class="mb-6">Join lobby {{ this.game.name }} <span class="text-sm">(id: {{ this.game_id }}) ${{ this.game.price }}</span></heading>
            </div>
        </div>

        <div class="overflow-hidden overflow-x-auto relative bg-white">

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                game_id: this.$route.params.id,
                game: {
                    name: "",
                    users: []
                },
                is_creator: false,
            }
        },

        computed: {

        },

        mounted() {
            Nova.request().get('/nova-vendor/bunqpoly/games/' + this.game_id)
                .then(response => {
                    this.game = response.data;
                });

            Echo.private(`game.${this.game_id}`)
                .listen('.game.changed', (event) => {
                    this.game = event.game;
                    console.log(event.game);
                });
        },

        methods: {

        },

    }
</script>

<style>
    /* Scoped Styles */
</style>
