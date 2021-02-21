<template>
    <form action="../GetDataStoreEvents.php" method="post">
      <p v-if="error">{{error}}</p>
      <div>
        <label for="depart">Date de départ:</label>
        <input type="date" name="depart" id="depart" v-model="date_de_depart">
        <label for="retour">Date de retour:</label>
        <input type="date" name="retour" id="retour" v-model="date_de_retour">
        <label for="message">Informer mes clients :</label>
        <textarea name="message" id="message" cols="30" rows="10" v-model="message"></textarea>
      </div>
      <button type="submit" @click="submit">Enregistrer les modifications</button>
    </form>
</template>

<script>
export default {
  name: 'Form',
  props: {
    msg: String
  },
  data() {
    return {
      checked: '',
      date_de_depart: '',
      date_de_retour: '',
      message: '',
      error: '',
      arr: []
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  form {
    width: 80%;
    padding: 8px;
    background: #f6f6f6;
    box-shadow: 1px 2px 2px #b4b4b4;
  }
  input, label {
    padding: 0.2rem 0;
    margin: 0.2rem 0;
    font-family: "Roboto Medium",serif;
    width: fit-content;
  }
  form div {
    display: flex;
    flex-direction: column;
    margin: auto;
  }

  form textarea {
    width: 50%;
  }
  a {
    background: #007cba;
    border-color: #007cba;
    color: #fff;
    text-decoration: none;
    text-shadow: none;
    padding: 6px 10px;
    display: flex;
    /* margin-top: 35px; */
    margin: 8px auto;
    width: fit-content;
    justify-content: space-evenly;
    cursor: pointer;
    -webkit-appearance: none;
    border-radius: 3px;
    white-space: nowrap;
    box-sizing: border-box;
    float: left;
  }
</style>
