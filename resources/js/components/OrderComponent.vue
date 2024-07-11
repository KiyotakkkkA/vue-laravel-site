<template>
    <img
        :src="item.imagePath"
        loading="eager"
        alt="Изображение блюда"
        class="item-image"
    />
    <div class="item-details">
        <span class="item-name">{{ item.name }}</span>
        <span class="item-details">{{
            item.price * (1 - item.currentCut / 100)
        }}</span>
    </div>
    <div class="changers">
        <button @click="session.selected.get(item.id).count++">+</button>
        <label class="count-label">{{
            session.selected.get(item.id).count
        }}</label>
        <button
            :disabled="session.selected.get(item.id).count == 1"
            :class="{
                'inactive-button': session.selected.get(item.id).count == 1,
            }"
            @click="session.selected.get(item.id).count--"
        >
            -
        </button>
        <label class="position-price-label">{{
            session.selected.get(item.id).positionValue *
            session.selected.get(item.id).count
        }}</label>
    </div>
</template>

<script setup>
defineProps({
    item: Object,
});
import data from "../session.js";
import { computed } from "vue";
var session = data.session;
session.totalValue = computed(() => {
    let total = 0;
    for (let item of session.selected.values()) {
        total += item.count * item.positionValue;
    }
    return total;
});
</script>

<style scoped>
.inactive-button {
    background-color: rgb(161, 161, 161);
    cursor: auto;
}

.changers .position-price-label {
    font-size: 50px;
    vertical-align: middle;
    margin-left: 20px;
    color: rgb(235, 130, 44);
}

.changers .count-label {
    position: relative;
    width: 35px;
    height: 50px;
    margin-left: 10px;
    margin-right: 10px;
    text-align: center;
    font-size: 30px;
    vertical-align: middle;
}
.changers button {
    width: 50px;
    height: 50px;
    font-size: 18px;
    border-radius: 50%;
    text-align: center;
    vertical-align: middle;
    padding: 0;
    transform: translateY(8%);
}
.changers {
    position: relative;
    padding-left: 45%;
}

img {
    width: 240px;
    height: 160px;
    margin-right: 20px;
}

.item-details {
    max-width: 50px;
    display: flex;
    flex-direction: column;
}

.item-name {
    font-weight: bold;
    font-size: 20px;
}
</style>
