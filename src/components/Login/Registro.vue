<template>
  <div>
  <form @submit.prevent="registrarUser">
      <input type="text" id="nombre" placeholder="Nombre" v-model="nombre" />
      <br />
      <input type="text" id="apellido" placeholder="Apellido" v-model="apellido" />
      <br />
      <input type="text" id="email" placeholder="Email" v-model="email" required/>
      <br />
      <input type="password" id="password" placeholder="Contraseña" v-model="pass" />
      <br />
      <input type="submit" value="Enviar" />

      <pre>{{$data}}</pre>
    </form>
  </div>
</template>
<script>
export default {
  name: "Registro",
  data() {
    return {
      nombre: "",
      apellido: "",
      email: "",
      pass: ""
    };
  },
  methods:{
      registrarUser(){

      },
      validarUser(){
          
      }
  }
};
</script>