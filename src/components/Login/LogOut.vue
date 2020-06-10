<template>
  <div>
      <button type="button" class="btn btn-warning" @click="logOutUser">LogOut</button>
    <hr />
  </div>
</template>
<script>


export default {
  name: "logOut",
  data() {
    return {
    
    };
  },
  methods: {
   
    // Manda los datos de el usuario al store
    logOutUser(){
      this.msg='LogOut';
      let data={"idUsuario":"","Nombre":"","Apellido":"","Email":"","Password":""}
      this.$store.commit('setUser',data);
      this.$store.commit('setLoged',false);
      this.$router.push('/');
    }
  }
};
</script>
<style scoped>

</style>