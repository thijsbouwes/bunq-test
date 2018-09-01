<template>
    <div
        :class="['card ' + column.classes, {'card--big': big, 'card--small': !big, 'card--small-rotated': cardSmallRotated, 'card--top': cardTop, 'card--rotated-left': cardLeft, 'card--rotated-right': cardRight}]"
    >
        <div
            v-if="!big"
            :class="['card__header card__header--' + column.color, {'card__header--rotated': cardSmallRotated}]"
        ></div>
        <div :class="['card__content ' + column.border]" >
            <div class="card__svg">
                <!--<span>{{ column.index }}</span>-->
                <img :src="`/images/game/${column.index}.png`">
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