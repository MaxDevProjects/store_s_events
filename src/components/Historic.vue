<template>
  <div class="loader" v-if="loading">
    loading data...
  </div>
  <table>
    <tr>
      <th>Start</th>
      <th>Return</th>
      <th>Message</th>
      <th></th>
    </tr>
    <tr v-for="data in allData" :key="data.id">
      <td>{{data.date_depart}}</td>
      <td>{{ data.date_retour }}</td>
      <td>{{ data.message }}</td>
      <td class="pointer" @click="removeRow(data.id)">❌<small>(delete)</small></td>
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
      id: null,
      loading: false
    }
  },
  created() {
    this.fetchAllData()
  },
  methods: {
    async fetchAllData() {
      this.loading = true
      axios.get('../wp-content/plugins/store-s-events/GetAllDataEvents.php')
          .then(response => {
            this.loading = false
            return this.allData = response.data
          })
          .catch(error => {
            this.loading = false
            console.log(error)
            return Promise.reject(error)
          })
    },
    removeRow(id) {
      axios.post("../wp-content/plugins/store-s-events/DeleteDataEvents.php?", null, {
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
.pointer {
  cursor: pointer;
}
.loader {
  width: 100%;
  text-align: center;
  position: absolute;
  height: 100%;
  background: #fffffff0;
  display: flex;
  justify-content: center;
  flex-direction: column;
  transition: 1s;
  font-size: 2em;
}
</style>