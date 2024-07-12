import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import App from "./App.vue";
import FoodList from "./views/FoodListView.vue";
import OrderList from "./views/OrderListView.vue";
import AdminPanel from "./views/AdminPanel.vue";

const router = createRouter({
    routes: [
        {
            path: "/choose",
            component: FoodList,
        },
        {
            path: "/cart",
            component: OrderList,
        },
        {
            path: "/adminpanel",
            component: AdminPanel,
        },
    ],
    history: createWebHistory(),
});

const app = createApp(App);
app.use(router);
app.mount("#app");
