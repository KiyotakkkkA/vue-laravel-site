<script setup>
import data from "./session";
import {} from "vue";
import HeaderComponent from "./components/HeaderComponent.vue";
import FooterComponent from "./components/FooterComponent.vue";

window.addEventListener("beforeunload", function () {
    data.saveSessionData("session", data.session);
});
</script>

<template>
    <header-component />
    <div class="main-content">
        <router-view />
    </div>
    <footer-component v-if="$route.path != '/adminpanel'" />
</template>

<style scoped>
.main-content {
    margin-top: 6%;
}
</style>
