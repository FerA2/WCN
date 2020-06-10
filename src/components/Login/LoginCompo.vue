<template>
  <div>
    <component :is="compo"></component>
  </div>
</template>
<script>
import Login from "./Login";
import LogOut from "./LogOut";

export default {
  name: "login-compo",
  components: {
    Login,
    LogOut
  },

  computed: {
    compo() {
      return !this.$store.state.loged ? "Login" : "LogOut";
    }
  }
};
</script>
<style scoped>
</style>