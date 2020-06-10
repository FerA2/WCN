<template>
  <!-- Vista pagina inicial-->
  <div class="agenda">
    <h3>Agenda</h3>
    <div class="row">
        <usuario class="col-lg-4 col-md-5 col-sm-6"></usuario>
        <span class="col-lg-8 col-md-7 col-sm-6">Controles</span>
    </div>
  </div>
</template>

<script>
import Usuario from '../components/Agenda/Usuario';
export default {
  name: "Agenda",
  components: {
    Usuario
  },

};
</script>
<style scoped>
.algo{
    background-color: aqua;
}
</style>