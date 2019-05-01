require("./axiosloader");
import Vue from "vue";

import router from "./router";
import App from "./App.vue";
import store from "./store";
import * as types from "./store/mutation-types";

import "./assets/styles/devwiki.scss";

new Vue({
  el: "#app",
  store,
  router,
  render: h => h(App),
  created() {
    this.$store.commit(types.RESET_LOADING_PROGRESS);
    this.$store.dispatch("getAllCategories");
    this.$store.dispatch("getAllPages");
  }
});
