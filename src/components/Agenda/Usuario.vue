<template>
  <div>
    <div class="media usuario">
      <div class="media-left imagen">
        <img src="img_avatar1.png" class="media-object" />
        <button
          class="btn btn-info btn-xs boton"
          data-toggle="modal"
          data-target="#userForm"
          @click="copiarDatos"
        >edit</button>
      </div>
      <div class="media-body datos">
        <ul class="list-group text-left">
          <li class="list-group-item">Nombre: {{nombre}}</li>
          <li class="list-group-item">Apellido: {{apellido}}</li>
          <li class="list-group-item">Email: {{email}}</li>
        </ul>
      </div>
    </div>
    <div
      class="modal fade"
      id="userForm"
      tabindex="-1"
      role="dialog"
      aria-labelledby="userForm"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="userForm">Modificar</h5>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <label for="nombre" class="col-4">Nombre</label>
                <input type="text" class="form-control col-7" v-model="newNombre" value="nombre" />
              </div>
              <div class="row">
                <label for="apeliido" class="col-4">Apellido</label>
                <input type="text" class="form-control col-7" v-model="newApellido" />
              </div>
              <!--
              <div class="row">
                <label for="email" class="col-4">Email</label>
                <input type="text" class="form-control col-7" v-model="newEmail" />
              </div>
              
              <div class="row">
                <label for="password" class="col-4">Password</label>
                <input type="password" class="form-control col-7" />
              </div>
              -->
            </form>
            <div class="alerta" v-if="msg">{{msg}}</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="resetForm">Close</button>
            <button type="submit" value="enviar" class="btn btn-success" @click="modificarUser">Enviar</button>
          </div>
          <div class="alerta" v-if="msg">{{msg}}</div>
          <pre>{{$data}}</pre>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "UserInfo",
  data() {
    return {
      // Variables para la edicion de datos
      newEmail: "",
      newNombre: "",
      newApellido: "",
      msg: ""
    };
  },
  computed: {
    nombre() {
      return this.$store.state.user.Nombre;
    },
    apellido() {
      return this.$store.state.user.Apellido;
    },
    email() {
      return this.$store.state.user.Email;
    }
  },

  methods: {
    copiarDatos() {
      this.newNombre = this.nombre;
      this.newApellido = this.apellido;
      this.newEmail = this.email;
    },
     resetForm() {
      this.newNombre = "";
      this.newApellido='';
      this.msg = "";
    },
    modificarUser(){
      let datos= JSON.stringify({
        url="usuarios",
        body={
          idUsuario: this.$store.state.user.idUsuario,
          Nombre: this.newNombre,
          Apellido: this.newApellido,
        }
      });
      this.$store.dispatch("updateUser",datos);
    }
    /*
    modificarUser() {
      const url = "http://localhost/web/Proyecto/WcnAPI/usuarios";
      //const url = "../API/Api.php";
      fetch(url, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          idUsuario: this.$store.state.user.idUsuario,
          Nombre: this.newNombre,
          Apellido: this.newApellido,
        })
      })
        .then(data => data.json())
        .then(data => {
          if (data.msg) this.msg= data.msg;
          else this.$emit("validarUser");
        })
        .catch(error => console.error(error));
    }
  }
};*/
</script>

<style scoped>
li {
  padding: 0.3rem;
}
.usuario {
  margin-left: 1rem;
}
.imagen {
  display: flex;
  flex-direction: column;
  align-content: space-around;
  justify-content: flex-end;
  width: 100px;
}
.row {
  align-items: flex-end;
}
.imagen img {
  height: 100px;
}
.datos {
  width: 70%;
}
.boton {
  padding: 0;
}
</style>