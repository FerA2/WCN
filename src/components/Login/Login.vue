<template>
  <div>
    <form @submit.prevent="validarUser">
      <input type="text" id="email" placeholder="Email" v-model="email" />
      <br />
      <input type="password" id="password" placeholder="Contraseña" v-model="pass" />
      <br />
      <input type="submit" value="Enviar" />
    </form>
    <pre>{{$data}}</pre>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "login",
  data() {
    return {
      email: "",
      pass: ""
    };
  },
  methods: {
    
    validarUser() {
      //const url='http://localhost/web/nodejs/wcnext/src/components/API/Api.php';
      const url = "../API/Api.php";
      fetch(url)
        .then(data => data.json())
        .then(data=>console.log(data))
        .catch(error=>console.error(error));    
    },
   /*
    registro() {
      servicio.registro(this.email,this.pass)
        .then(datos => console.log(datos));
    },*/
    getDatos(){
      const url = "../API/Api.php";
      axios.get(url)
        .then(datos=>console.log(datos.data));
    }
  }
};
</script>