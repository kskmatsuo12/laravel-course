// Vue.component(
//     "example-component",
//     require("./components/ExampleComponent.vue").default
// );

require("./bootstrap");

window.Vue = require("vue");

import router from "./router";
import store from "./store/index";
import AppComponent from "./components/AppComponent";

const app = new Vue({
    el: "#app",
    router,
    store,
    components: {
        "app-component": AppComponent
    }
});
