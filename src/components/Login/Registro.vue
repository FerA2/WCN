<template>
  <div>
    <form>
      <div class="row">
        <label for="nombre" class="col-4">Nombre</label>
        <input
          type="text"
          class="form-control col-7"
          v-model="nombre"
          placeholder="Introduce Nombre"
        />
      </div>
      <div class="row">
        <label for="apeliido" class="col-4">Apellido</label>
        <input
          type="text"
          class="form-control col-7"
          v-model="apellido"
          placeholder="Introduce Apellido"
        />
      </div>
    </form>

    <div class="modal-footer">
      <button type="button" value="Login" class="btn btn-info" @click="loginCompo">Login</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="resetForm">Close</button>
      <button
        type="button"
        value="enviar"
        class="btn btn-success"
        @click.prevent="registrarUser"
      >Enviar</button>
    </div>
    <pre>{{$data}}</pre>
  </div>
</template>
<script>
export default {
  name: "Registro",
  props: ["email", "pass"],
  data() {
    return {
      nombre: "",
      apellido: ""
    };
  },
  methods: {
    loginCompo() {
      this.$emit("login");
    },
    resetForm() {
      this.nombre = "";
      this.apellido = "";
      this.$emit("reset");
    },
    enviarMsg() {},
  
    registrarUser() {
      const url = "http://localhost/web/Proyecto/WcnAPI/usuarios";
      //const url = "../API/Api.php";
      fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          Nombre: this.nombre,
          Apellido: this.apellido,
          Email: this.email,
          Password: this.pass
        })
      })
        .then(data => data.json())
        .then(data => {
          if (data.msg) this.$emit('enviarMsg',data.msg);
          else this.$emit('validarUser');
        })
        .catch(error => console.error(error));
    }
  }
};
</script>