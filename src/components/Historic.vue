<template>
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
      <td @click="removeRow(data.id)">❌</td>
    </tr>
  </table>
</template>

<script>
import axios from "axios";

export default {
  name: "Historic",
  data() {
    return {
      allData: '',
      id: null
    }
  },
  created() {
    this.fetchAllData()
  },
  methods: {
    async fetchAllData() {
      axios.get('http://localhost/ownplugins_sandbox/wp-content/plugins/store-s-events/GetAllDataEvents.php')
          .then(response => {
            this.allData = response.data
          })
          .catch(error => {
            console.log(error)
          })
    },
    removeRow(id) {
      axios.post("http://localhost/ownplugins_sandbox/wp-content/plugins/store-s-events/DeleteDataEvents.php?", null, {
        params: {
          id: id
        }
      })
      .then(res => {
        this.fetchAllData()
        return res
      })
      .catch(error => {
        console.log(error)
      })
    }
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