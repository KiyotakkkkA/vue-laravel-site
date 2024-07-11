<script setup>
import data from "../session";

const session = data.session;
defineProps({
    item: Object,
});
</script>

<template>
    <div class="elem">
        <h1 class="product-name">{{ item.name }}</h1>
        <img :src="'/' + item.imagePath" width="480" height="320" />
        <h2 v-if="item.currentCut + session.personalCut == 0">
            {{ item.price }} руб.
        </h2>
        <h2 v-else>
            <del class="new-price">{{ item.price }} </del>
            {{
                item.price * (1 - (item.currentCut + session.personalCut) / 100)
            }}
            руб.
        </h2>
        <slot class="elem-inner" />
    </div>
</template>

<style scoped>
h2 {
    margin-bottom: 20px;
}

.product-name {
    margin-bottom: 20px;
    text-align: center;
    font-size: 40px;
    font-weight: bold;
}

.elem {
    background: rgba(255, 255, 255, 0);
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.elem img {
    border-radius: 20px;
    object-fit: cover;
}
.elem del.new-price {
    color: rgb(235, 130, 44);
    font-weight: 100;
}
</style>

<style>
.elem button {
    border-radius: 20px;
}
.elem button.select:hover {
    background-color: rgb(248, 193, 148);
    color: black;
    transition: background-color 0.2s ease-in-out;
}
.elem button.deselect {
    background-color: rgb(235, 130, 44);
    color: black;
}

.elem button.deselect:hover {
    background-color: #333;
    color: white;
    transition: background-color 0.2s ease-in-out;
}
</style>
