<script setup>
import Navbar from './components/Navbar.vue';
import {RouterView} from 'vue-router';

</script>


<template lang="">

    <div class="h-full min-h-screen bg-cover bg-[url('../js/images/background_01.jpg')] bg-fixed ">
        <Navbar />
        <RouterView />
    </div>   

</template>
<script>

export default {
  components: {
    Navbar,
  },
  //   data() {
  //     // return {
  //     //   whoAmI: this.$root.whoAmI,
  //     // }
  //   },
  //   beforeMount() {
  //       // console.log(this.whoAmI);
  //   },
  }
</script> -->





