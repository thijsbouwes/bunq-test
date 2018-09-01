<template>
    <div>
        <div class="board-wrapper">
            <div class="board">
                <div class="board__row">
                    <card
                        v-for="(column, index) in rows[0]"
                        :data-index="column.index"
                        :column="column"
                        :rowIndex="0"
                        :key="index">
                    </card>
                </div>
                <div class="board__row board__row--big">
                    <div class="board__col board__col--left">
                        <card
                            v-for="(column, index) in rows[1]"
                            :data-index="column.index"
                            :column="column"
                            :rowIndex="1"
                            :key="index">
                        </card>
                    </div>
                    <div class="board__logo" >
                        <img src="/images/game/logo.png">
                    </div>
                    <div class="board__col board__col--right">
                        <card
                            v-for="(column, index) in rows[2]"
                            :data-index="column.index"
                            :column="column"
                            :rowIndex="2"
                            :key="index">
                        </card>
                    </div>
                </div>
                <div class="board__row">
                    <card
                        v-for="(column, index) in rows[3]"
                        :data-index="column.index"
                        :column="column"
                        :rowIndex="3"
                        :key="index">
                    </card>
                </div>
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
                rows: [
                    [],
                    [],
                    [],
                    []
                ],
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
            isFirstOrSecond(index)
            {
                return index == 1 || index == 2;
            }
        },

    }
</script>

<style>
    /* Scoped Styles */
</style>
