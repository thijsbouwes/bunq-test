<template>
    <div>
        <div class="game-menu">
            <div class="game-menu__players">
                <div class="game-menu__player game-menu__player--blue">
                    <span class="game-menu__title">Jeroen Groenveld</span>
                    <span class="game-menu__money">&euro; 1500,-</span>
                </div>
                <div class="game-menu__player game-menu__player--green game-menu__player--disabled">
                    <span class="game-menu__title">Jeroen Groenveld</span>
                    <span class="game-menu__money">&euro; 1500,-</span>
                </div>
                <div class="game-menu__player game-menu__player--blue-dark game-menu__player--disabled">
                    <span class="game-menu__title">Jeroen Groenveld</span>
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
