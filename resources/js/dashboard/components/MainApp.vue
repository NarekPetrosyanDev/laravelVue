<template>
   <div>
       <v-header></v-header>
       <router-view></router-view>
       <v-footer></v-footer>
   </div>
</template>

<script>
import Header from "./Header";
import Footer from "./Footer";

export default {
    name: "MainApp",
    components: {
        vHeader: Header,
        vFooter: Footer
    }
}
</script>

<style scoped>

</style>
