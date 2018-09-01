<template>
    <div>
        <div class="game-menu">
            <div class="game-menu__players">
                <div class="game-menu__player game-menu__player--blue" v-for="user in game.users">
                    <span class="game-menu__title">{{ user.name }}</span>
                    <span class="game-menu__money">&euro; 1500,-</span>
                </div>
            </div>
            <div class="game-menu__buttons">
                <button type="button" class="game-menu__button game-menu__button--swipe">Swipe to throw</button>
                <div class="game-menu__buttons-50">
                    <button type="button" class="game-menu__button game-menu__button--buy">Buy</button>
                    <button type="button" class="game-menu__button game-menu__button--next">Next</button>
                </div>
            </div>
        </div>

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
                    <div class="board__middle">
                        <div class="board__chancecards" id="chancecards">
                            <img src="/images/game/chancecards.png">
                        </div>
                        <div class="board__logo" >
                            <img src="/images/game/logo.png">
                        </div>

                        <div class="flip-container">
                            <div class="flipper">
                                <div class="front chancecard">
                                    <!-- front content -->
                                </div>
                                <div class="back chancecard">
                                    <span class="chancecard__title">CHANCE</span>
                                    <p class="chancecard__message">You were drunk yesterday go to the skihut now to pay the bil of &euro; 150.</p>
                                    <button type="button" class="btn btn-primary chancecard__button">Oke</button>
                                </div>
                            </div>
                        </div>

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

            Nova.request().get('/nova-vendor/bunqpoly/game/' + this.game_id + '/turn')
                .then(response => {
                    console.log(response);
                });

            Echo.private(`game.${this.game_id}`)
                .listen('.game.changed', (event) => {
                    this.game = event.game;
                    console.log(event.game);
                })
                .listen('game.user.move', (event) => {
                    console.log("A user is moving");
                    this.game = event.game;
                    console.log(event.game);
                })
                .listen('game.user.turn', (event) => {
                    console.log("Your turn user is moving");
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
