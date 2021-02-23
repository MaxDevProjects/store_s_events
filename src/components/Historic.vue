<template>
  <p>Watch your historic 😀</p>
  <table>
    <tr>
      <th>Date de départ</th>
      <th>Date de retour</th>
      <th>Message</th>
      <th></th>
    </tr>
    <tr v-for="data in allData" :key="data.id">
      <td>{{data.date_depart}}</td>
      <td>{{ data.date_retour }}</td>
      <td>{{ data.message }}</td>
      <td>❌</td>
    </tr>
  </table>
</template>

<script>
import axios from "axios";

export default {
  name: "Historic",
  data() {
    return {
      allData: ''
    }
  },
  mounted() {
    axios.get('http://localhost/ownplugins_sandbox/wp-content/plugins/store-s-events/getAllDataEvents.php')
    .then(response => {
      this.allData = response.data
    })
    .catch(error => {
      console.log(error)
    })
  }
}
</script>

<style scoped>
div {
  width: 100%;
}
table {
  width: 80%;
  display: inline-block;
  text-align: left;
}
th, td {
  padding: 4px 16px;
}
</style>