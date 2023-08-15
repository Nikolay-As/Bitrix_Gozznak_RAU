import Vue from "vue";

import "vue-slim-tabs/themes/default.css";
import "./scss/app.scss";
import VCatalog from "./components/VCatalog.vue";

document.addEventListener("DOMContentLoaded", () => {
    new Vue({
        el: "#v-catalog",
        components: {VCatalog}
    });
});