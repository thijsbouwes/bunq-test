<template>
    <div>
        <div class="board-wrapper">
            <div class="board" id="board">
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
    import Board from "../Board";

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
                    this.initGame();
                });

            Echo.private(`game.${this.game_id}`)
                .listen('.game.changed', (event) => {
                    this.game = event.game;
                    console.log(event.game);
                });
        },

        methods: {
            isFirstOrSecond(index)
            {
                return index == 1 || index == 2;
            },

            initGame()
            {
                let ref = this;
                let checkDone = setInterval(function(){
                    if($('#board').find('.property').length)
                    {
                        // start dice
                        dice_initialize(document.body);

                        Board.init();
                        ref.game.users.map(user => {
                            Board.addPlayer(1, user.name.charAt(0), 0, );
                        });

                        // Board.showMessage('Player  turn!');

                        clearInterval(checkDone);
                    }
                }, 100);
            }
        },

    }
</script>

<style>
    /* Scoped Styles */
</style>
