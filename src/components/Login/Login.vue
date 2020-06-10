<template>
  <div>
    <!-- Button trigger modal -->
    <label class="boton">
      Login | Registro
      <button
        type="button"
        class="btn btn-primary"
        data-toggle="modal"
        data-target="#loginForm"
      >Click</button>
    </label>
    <!-- Modal -->
    <div
      class="modal fade"
      id="loginForm"
      tabindex="-1"
      role="dialog"
      aria-labelledby="loginForm"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginForm">{{vista}}</h5>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>-->
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <label for="email" class="col-4">Email</label>
                <input
                  type="text"
                  class="form-control col-7"
                  v-model="email"
                  placeholder="Introduce email"
                />
              </div>
              <div class="row">
                <label for="password" class="col-4">Password</label>
                <input
                  type="password"
                  class="form-control col-7"
                  v-model="pass"
                  placeholder="Intoduce password"
                />
              </div>
            </form>
              <Registro
                v-on:login="loginCompo"
                v-on:reset="resetForm"
                v-on:enviarMsg="cambiarMsg"
                v-on:validarUser="validarUser"
                :email="email"
                :pass="pass"
                v-if="vista=='Registro'"
              ></Registro>
           
            <div class="alerta" v-if="msg">{{msg}}</div>
          </div>
          <div class="modal-footer" v-if="vista=='Login'">
            <button
              type="button"
              value="registro"
              class="btn btn-info"
              @click="registroCompo"
            >Registro</button>
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
              @click="resetForm"
            >Close</button>
            <button
              v-if="vista=='Login'"
              type="submit"
              value="enviar"
              class="btn btn-success"
              @click.prevent="validarUser"
            >Enviar</button>
          </div>

          <pre>{{$data}}</pre>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Registro from "./Registro";
//import LogOut from './LogOut';

export default {
  name: "login",
  components: {
    Registro
  },
  data() {
    return {
      vista: "Login",
      email: "",
      pass: "",
      msg: ""
    };
  },
  methods: {
    /* Envia una peticion Http a la Api y verifica la respuesta, la respuesta seran
     los datos del usuario encontrado y los usara en el login*/
    // TODO: codificar pass
    validarUser() {
      const url = "http://localhost/web/Proyecto/WcnAPI/loginUser";
      //const url = "../API/Api.php";
      fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          Email: this.email,
          Password: this.pass
        })
      })
        .then(data => data.json())
        .then(data => {
          if (data.msg) this.msg = data.msg;
          else this.loginUser(data[0]);
          //this.msg = data.msg;
        })
        .catch(error => console.error(error));
    },

    // Manda los datos de el usuario al store
    loginUser(data) {
      //this.msg = "Usuario encontrado";
      this.$store.commit("setUser", data);
      this.$store.commit("setLoged", true);
      this.resetModal();
      this.$router.push("agenda");
    },
    //Forzar cierre modal sin JQUERY
    resetModal() {
      let body = document.getElementById("body");
      let modal = body.lastChild;
      modal.parentNode.removeChild(modal);
    },
    // Reset manual
    resetForm() {
      this.email = "";
      this.pass = "";
      this.msg = "";
    },
    registroCompo() {
      this.msg = "";
      this.vista = "Registro";
    },
    loginCompo() {
      this.msg = "";
      this.vista = "Login";
    },
    cambiarMsg(msg) {
      this.msg = msg;
    }
  }
};
</script>
<style scoped>
.boton {
  margin-bottom: 0;
}
#loginForm {
  color: black;
}
.alerta {
  margin-top: 1rem;
  color: red;
  background-color: aqua;
}
</style>