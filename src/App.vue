<template>
  <Form/>
</template>

<script>
import Form from "./components/Form";

export default {
  name: 'App',
  components: {
    Form,
  }
}
</script>

<style>
#app {
  font-family: "Roboto Medium",serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
  display: flex;
  flex-direction: column;
  width: 100%;
}
</style>
