<script setup>
import ItemComponent from "../components/ItemComponent.vue";
import ModalAboutFoodComponent from "../components/ModalAboutFoodComponent.vue";
import { ref, computed, onMounted } from "vue";
import data from "../session";
import axios from "axios";
var session = data.session;

const all = ref([]);

onMounted(() => {
    axios
        .get("/menudata")
        .then((response) => {
            all.value = response.data;
        })
        .catch((error) => {
            console.error(error);
        });
});

const showModal = ref(true);
const focusOn = ref(null);

session.totalValue = computed(() => {
    let total = 0;
    for (let item of session.selected.values()) {
        total += item.count * item.positionValue;
    }
    return total;
});

function select(item) {
    session.selected.set(item.id, { count: 1, positionValue: item.price });
}

function decreaseCount(item) {
    session.selected.get(item.id).count--;
    if (session.selected.get(item.id).count == 0) {
        session.selected.delete(item.id);
        return;
    }
}

function moreInformation(item) {
    focusOn.value = item.id;
    showModal.value = true;
}
</script>

<template>
    <div class="grid-container">
        <div v-for="item in all" :key="item.id" class="item-container">
            <item-component :item="item">
                <div class="deselect" v-if="session.selected.has(item.id)">
                    <div class="changers">
                        <button @click="session.selected.get(item.id).count++">
                            +
                        </button>
                        <label class="count-label">{{
                            session.selected.get(item.id).count
                        }}</label>
                        <button @click="decreaseCount(item)">-</button>
                    </div>
                </div>
                <div v-else>
                    <button class="select" @click="select(item)">
                        Добавить в корзину
                    </button>
                    <button class="select" @click="moreInformation(item)">
                        Подробнее
                    </button>
                </div>
            </item-component>

            <modal-about-food-component
                :showModal="showModal"
                :item="item"
                :focusOn="focusOn"
            >
                <button @click="showModal = false">Закрыть</button>
            </modal-about-food-component>
        </div>
    </div>
    <h1>
        Ваша текущая скидка:
        {{ session.personalCut }}%
    </h1>
    <button @click="session.personalCut++">Увеличить скидку</button>
</template>

<style>
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

body {
    margin: 20px;
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: #333;
}

body button {
    margin-bottom: 10px;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    border: none;
    cursor: pointer;
}

.grid-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-auto-rows: auto;
    gap: 20px;
}

.grid-container > div {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: #fff;
    padding: 1px;
    border-radius: 10%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.274);
}

.grid-container > div button {
    margin-top: 10px;
}

.select {
    margin-right: 10px;
}
</style>
