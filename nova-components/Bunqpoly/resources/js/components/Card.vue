<template>
    <div
        :class="['property ' + column.classes, {'property--big': big, 'property--small': !big, 'property--small-rotated': propertySmallRotated, 'property--top': propertyTop, 'property--rotated-left': propertyLeft, 'property--rotated-right': propertyRight}]"
    >
        <div
            v-if="!big"
            :class="['property__header property__header--' + column.color, {'property__header--rotated': propertySmallRotated}]"
        ></div>
        <div :class="['property__content ' + column.border]" >
            <div class="property__svg">
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
            propertySmallRotated() {
                return this.rowIndex == 1 || this.rowIndex == 2;
            },
            propertyTop() {
                return this.rowIndex == 0;
            },
            propertyLeft() {
                return this.rowIndex == 1;
            },
            propertyRight() {
                return this.rowIndex == 2;
            }
        }
    }
</script>