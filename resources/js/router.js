import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./components/HomeComponent";
import Login from "./components/LoginComponent";
import Register from "./components/RegisterComponent";
import ApiHome from "./components/ApiHomeComponent";

const routes = [
    {
        path: "/",
        name: "home",
        component: Home
    },
    {
        path: "/api/test/login",
        name: "login",
        component: Login
    },
    {
        path: "/api/test/register",
        name: "register",
        component: Register
    },
    {
        path: "/api/test/home",
        name: "api_home",
        component: ApiHome,
        meta: {
            requiresAuth: true
        }
    }
];

export default new VueRouter({
    //URLに#をつけなくする
    mode: "history",
    routes
});
