import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import LoginVista from "../views/LoginVista.vue";
import RegistroVista from "../views/RegistroVista.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home
  },
  {
    path: "/login",
    name: "Login",
    component: LoginVista
  },
  {
    path: "/registro",
    name: "Registro",
    component: RegistroVista
  }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;
