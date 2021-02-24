<template>
  <p>
    🌴<span>{{ date_depart }}</span>
    <span v-if="date_retour !== '0000-00-00'">➡ {{date_retour}}</span>
    <span>{{ message }}</span>
  🌴
  </p>
</template>

<script>
export default {
name: "Event",
  data() {
    return {
      date_depart: "",
      date_retour: "",
      message: "",
    }
  }
}
</script>

<style scoped>

</style>