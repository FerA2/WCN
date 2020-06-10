import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import AgendaVista from "../views/AgendaVista.vue";
//import RegistroVista from "../views/RegistroVista.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home
  },
  {
    path: "/agenda",
    name: "Agenda",
    component: AgendaVista
  },
  /*
  {
    path: "/registro",
    name: "Registro",
    component: RegistroVista
  }/*/
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;
