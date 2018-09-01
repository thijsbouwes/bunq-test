<template>
    <div>
        <div class="flex justify-between">
            <div class="relative h-9 mb-6">
                <heading class="mb-6">{{ this.game.name }} <span class="text-sm">(id: {{ this.game_id }}) ${{ this.game.price }}</span></heading>
            </div>
        </div>

        <div class="board-wrapper">
            <div class="board">
                <template
                    v-for="(row, index) in rows"
                >
                    <div class="board__row" v-if="index == 0">
                        <card
                            v-for="(column, index) in row"
                            :column="column"
                            :key="index">
                        </card>
                    </div>
                    <div class="board__row board__row--big" v-else-if="index == 1">
                        <div class="board__col board__col--left">
                            <card
                                v-for="(column, index) in row"
                                :column="column"
                                :key="index">
                            </card>
                        </div>
                    </div>
                    <div class="board__col board__col--right" v-else-if="index == 2">
                        <div class="board__logo" >
                            <span>svg</span>
                        </div>
                        <card
                            v-for="(column, index) in row"
                            :column="column"
                            :key="index">
                        </card>
                    </div>
                    <div class="board__row" v-else-if="index == 3">
                        <card
                            v-for="(column, index) in row"
                            :column="column"
                            :key="index">
                        </card>
                    </div>
                </template>
            </div>
        </div>

        <div id="dice" class="dice"></div>

    </div>
</template>

<script>
    import Card from "./Card";

    export default {
        components: {Card},
        data() {
            return {
                game_id: this.$route.params.id,
                game: {
                    name: "",
                    users: []
                },
                rows: [],
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

            Nova.request().get('/nova-vendor/bunqpoly/properties')
                .then(response => {
                    this.rows = response.data;
                });

            Echo.private(`game.${this.game_id}`)
                .listen('.game.changed', (event) => {
                    this.game = event.game;
                    console.log(event.game);
                });

            dice_initialize(document.body);
        },

        methods: {

        },

    }
</script>

<style>
    /* Scoped Styles */
</style>
