<template>
    <div class="cart">
        <div class="cart-header">
            <h2>Корзина</h2>
        </div>
        <div v-for="item in cartItems" :key="item.id" class="cart-item">
            <order-component :item="item" />
        </div>
        <div class="cart-total">
            <span>Итого: {{ session.totalValue }}</span>
            <button @click="clearCart">Очистить корзину</button>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref } from "vue";
import data from "../session";
import OrderComponent from "../components/OrderComponent.vue";
import axios from "axios";

const cartItems = ref([]);

axios
    .get("/api/menudata")
    .then((response) => {
        cartItems.value = response.data.filter((item) =>
            session.selected.has(item.id)
        );
    })
    .catch((error) => {
        console.error(error);
    });

const session = reactive(data.session);

const clearCart = () => {
    cartItems.value.forEach((item) => {
        session.selected.delete(item.id);
    });
    cartItems.value.splice(0);
};
</script>

<style>
button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.cart-total {
    margin: 0 auto;
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.cart-total span {
    font-size: 40px;
    transform: translateX(60%);
}

.cart {
    width: 90%;
    margin: 0 auto;
}

.cart-header {
    text-align: center;
}

.cart-item {
    display: flex;
    align-items: center;
    border: 1px solid #ccc;
    border-left: none;
    border-right: none;
    position: relative;
    padding: 10px;
    width: 90%;
    flex-wrap: wrap;
    gap: 20px;
    margin: 0 auto;
}

.cart-item:hover {
    border-color: rgb(235, 130, 44);
    transition: border-color 0.5s ease;
}
</style>
