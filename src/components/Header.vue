<template>
  <div class="container-fluid head">
    <h1>WCN</h1>
    <div class="menu">
      <Navegador></Navegador>
      <Login-compo></Login-compo>
    </div>
  </div>
</template>

<script>
import Navegador from "./Navegador";
import LoginCompo from "./Login/LoginCompo";
export default {
  name: "Header",
  components: {
    Navegador,
    LoginCompo
  }

};
</script>

<style scoped>
.head{
    background-color: darkslategray;
    color: white;
    display: flex;
    flex-direction: column;
}
.menu{
  display:flex;
  justify-content: space-between;
  align-items: center;
}
</style>