<template>
    <div
        class="card"
        :class="{'card--big': big, 'card--small': !big, 'card--small-rotated': cardSmallRotated, 'card--top': cardTop, 'card--rotated-left': cardLeft, 'card--rotated-right': cardRight}"
    >
        <div
            class="card__header"
            :class="{'card__header--rotated': big, }"
        >
            <div class="card__content" v-if="big">
                <div class="card__player-wrapper" v-if="column.index == 1">
                    <div class="card__player-icon card__player-icon--green">
                        <span>JG</span>
                    </div>
                    <div class="card__player-icon card__player-icon--blue">
                        <span>KR</span>
                    </div>
                    <div class="card__player-icon card__player-icon--red">
                        <span>KR</span>
                    </div>
                    <div class="card__player-icon card__player-icon--orange">
                        <span>KR</span>
                    </div>
                </div>
                <div class="card__svg" v-else>
                    <!--@include('svg/card/'.$card['index'], ['name' => $card['name'], 'city' => $card['city'], 'price' => $card['price']])-->
                </div>
            </div>

            <div class="card__content" v-else>
                <div class="card__svg">
                    @include('svg/card/'.$card['index'])
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['column'],

        computed: {
            big() {
                return this.column.size == 'big';
            },
            cardSmallRotated() {
                return this.column.index == 1 || this.column.index == 2;
            },
            cardTop() {
                return this.column.index == 0;
            },
            cardLeft() {
                return this.column.index == 1;
            },
            cardRight() {
                return this.column.index == 2;
            }
        }
    }
</script>