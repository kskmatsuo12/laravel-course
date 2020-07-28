// Vue.component(
//     "example-component",
//     require("./components/ExampleComponent.vue").default
// );

require("./bootstrap");

window.Vue = require("vue");

import router from "./router";
import AppComponent from "./components/AppComponent";

const app = new Vue({
    el: "#app",
    router,
    components: {
        "app-component": AppComponent
    }
});
