<template>
    <nav>
        <ul>
            <li>
                <button class="settings-button">
                    <img src="../../../public/media/settings_icon_asset.png" />
                </button>

                <div class="context-menu" v-if="showMenu">
                    <transition name="fade"
                        >\
                        <div>
                            <ul>
                                <li>Пункт меню 1</li>
                                <li>Пункт меню 2</li>
                                <li>Пункт меню 3</li>
                            </ul>
                        </div>
                    </transition>
                </div>
            </li>
            <li><a href="/">Главная</a></li>
            <li><a href="choose">Шаурма</a></li>
            <li>
                <div class="cart-container" :count="calculateInCart">
                    <a href="cart">
                        <img
                            src="../../../public/media/shop_icon_asset.png"
                            class="cart-icon"
                            width="50"
                            height="50"
                        />
                        <span class="total-price-text"
                            >{{
                                Math.round(
                                    session.totalValue *
                                        (1 - session.personalCut / 100)
                                )
                            }}
                            руб.</span
                        >
                    </a>
                </div>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import data from "../session";
import { computed, ref } from "vue";
var session = data.session;

const showMenu = ref(false);

const calculateInCart = computed(() => {
    let lenght = 0;
    for (let item of session.selected.values()) {
        lenght += item.count;
    }

    return lenght;
});
</script>

<style scoped>
.settings-button {
    padding: 0px;
    background: none;
    border: none;
    cursor: pointer;
    transition: 0.4s ease-in-out;
    transform: scale(0.8);
}

.settings-button:hover {
    transform: scale(1);
}

nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin: 0 10px;
    vertical-align: middle;
    height: 90%;
}

nav ul li a:hover {
    color: #000000;
}

nav ul li a {
    position: relative;
    display: inline-block;
    padding: 10px;
    color: rgb(122, 122, 122);
    text-decoration: none;
    font-weight: bold;
    text-transform: uppercase;
    transition: all 0.3s;
}

nav ul li a::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 3px;
    background-color: rgb(235, 130, 44);
    transition: width 0.3s;
}

nav ul li a:hover::after {
    width: 100%;
}

.cart-container {
    display: flex;
    align-items: center;
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-55%);
    font-size: larger;
}

.total-price-text {
    color: rgb(235, 130, 44);
}

.cart-icon {
    position: relative;
}

.cart-container[count="0"]::after {
    display: none;
}

.cart-container:not([count="0"])::after {
    content: attr(count);
    position: absolute;
    bottom: -8px;
    right: -8px;
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 4px;
    width: 10%;
    text-align: center;
    font-size: 14px;
    transform: scale(1.1) translateX(-530%) translateY(-70%);
}
</style>
