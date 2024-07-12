<template>
    <div class="page">
        <div class="container" v-if="!session.isAdmin">
            <h2>Авторизация</h2>
            <form>
                <div class="form-group">
                    <input
                        placeholder="Имя пользователя или Email"
                        type="text"
                        id="username"
                        name="username"
                        required
                    />
                </div>
                <div class="form-group">
                    <input
                        placeholder="Пароль"
                        type="password"
                        id="password"
                        name="password"
                        required
                    />
                </div>
                <div class="form-group">
                    <button type="submit" @click="Login">Войти</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import data from "../session";
import { reactive } from "vue";

const session = reactive(data.session);

function Login() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    axios
        .post("/api/checkauth", {
            login: username,
            pass: password,
        })
        .then((dt) => {
            session.isAdmin = dt.data.status;
        });
}
</script>

<style scoped>
.page {
    width: 100%;
    height: 800px;

    vertical-align: middle;

    transform: translateY(-10px);

    background-size: 100% 100%;
    background-position: 0px 0px, 0px 0px, 0px 0px, 0px 0px, 0px 0px;
    background-image: radial-gradient(
            49% 81% at 45% 47%,
            #ffe20345 0%,
            #073aff00 100%
        ),
        radial-gradient(113% 91% at 17% -2%, #ff5a00ff 1%, #ff000000 99%),
        radial-gradient(142% 91% at 83% 7%, #ffdb00ff 1%, #ff000000 99%),
        radial-gradient(142% 91% at -6% 74%, #ff0049ff 1%, #ff000000 99%),
        radial-gradient(
            142% 91% at 111% 84%,
            #f90000ff 0%,
            #ff5a00ff 0%,
            #ff0000ff 100%
        );
}

.container {
    background-color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transform: translateY(70%);
    width: 350px;
    height: 300px;
    margin: 0 auto;
    border-radius: 4%;
    filter: drop-shadow(0 0 5px white);
    margin-top: 0px;
}

h2 {
    color: rgb(235, 130, 44);
    font-size: 36px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
    flex-grow: 1;
}

label {
    color: rgb(235, 130, 44);
    width: 300px;
    height: 35px;
}

input {
    width: 300px;
    height: 35px;
    border: 1px solid rgb(235, 130, 44);
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    width: 300px;
    height: 35px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    font-size: 16px;
    color: white;
    background-color: rgb(235, 130, 44);
}

button:hover {
    background-color: rgb(170, 96, 35);
    filter: drop-shadow(0 0 5px rgb(243, 150, 74));
}
</style>
