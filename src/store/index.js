import Vue from "vue";
import Vuex from "vuex";
import serviciosApi from "../Servicios/serviciosAPI";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    loged:false,
    user:{
      /*
      idUsuario:'',
      Nombre:'',
      Apellido:'',
      Email:''
      */
    },
    fechaInicial:'',
    fechaFinal:'',
    tareas:[],
  },
  mutations: {
    /*
    setUser(state,datos){
      state.user.idUsuario=datos.idUsuario;
      state.user.Nombre=datos.Nombre;
      state.user.Apellido=datos.Apellido;
      state.user.Email=datos.Email;
    },*/
    setUser(state,datos){
      state.user=datos;
    },
    setLoged(state,valor){
      state.loged=valor;
    },
  
  },
  actions: {
    /*/
  refresDatos(state,datos){
    state.commit('setUser',datos);
    },*/
    getUser({commit},datos){
      return new Promise((resolve) =>{
        serviciosApi.read((datos) => {
          this.$store.commit("setUser",datos);
          resolve();
        });
      });
    },
    updateUser({commit},datos){
      return new Promise((resolve) =>{
        serviciosApi.update((datos) => {
          this.$store.commit("setUser",datos);
          resolve();
        });
      });
    }
  },
  modules: {}
});
