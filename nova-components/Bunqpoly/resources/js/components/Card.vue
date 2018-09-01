<template>
    <div
        :class="['card ' + column.classes + ' test', {'card--big': big, 'card--small': !big, 'card--small-rotated': cardSmallRotated, 'card--top': cardTop, 'card--rotated-left': cardLeft, 'card--rotated-right': cardRight}]"
    >
        <div
            v-if="!big"
            :class="['card__header card__header--' + column.color, {'card__header--rotated': cardSmallRotated}]"
        >
            <div :class="['card__content ' + column.border]" >
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
        </div>
        <div class="card__content" v-else>
            <div class="card__svg">
                <!--@include('svg/card/'.$card['index'])-->
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['column', 'rowIndex'],

        computed: {
            big() {
                return this.column.size == 'big';
            },
            cardSmallRotated() {
                return this.rowIndex == 1 || this.rowIndex == 2;
            },
            cardTop() {
                return this.rowIndex == 0;
            },
            cardLeft() {
                return this.rowIndex == 1;
            },
            cardRight() {
                return this.rowIndex == 2;
            }
        }
    }
</script>