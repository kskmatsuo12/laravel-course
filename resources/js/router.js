import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/HomeComponent";

const routes = [
    {
        path: "/",
        name: "home",
        component: Home
    }
];

export default new VueRouter({
    //URLに#をつけなくする
    mode: "history",
    routes
});
