<template>
  <div id="app">
    <router-view />
  </div>
</template>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<script>
    export default {
        mounted() {
            axios.get('/sanctum/csrf-cookie');
        }
    }
</script>
