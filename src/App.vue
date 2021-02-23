<template>
  <Pagination/>
</template>

<script>
import Pagination from "./components/Pagination";

export default {
  name: 'App',
  components: {
    Pagination,
  }
}
</script>

<style>
  body {
    margin: 0;
  }
#app {
  font-family: "Roboto Medium",serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  display: flex;
  flex-direction: column;
  width: 100%;
  margin: 0;
  padding: 0;
}
</style>
