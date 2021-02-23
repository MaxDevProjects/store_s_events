<template>
    <form method="post">
      <p v-if="error">{{error}}</p>
      <div>
        <label for="date_de_depart">Date de départ:</label>
        <input type="date" name="date_de_depart" id="date_de_depart" v-model="date_de_depart">
        <label for="date_de_retour">Date de retour:</label>
        <input type="date" name="date_de_retour" id="date_de_retour" v-model="date_de_retour">
        <label for="message">Informer mes clients :</label>
        <textarea name="message" id="message" cols="30" rows="10" v-model="message"></textarea>
      </div>
      <a id="submit" @click="submit" value="Enregistrer les modifications">Enregistrer les modifications</a>
    </form>
</template>

<script>
import axios from "axios";

export default {
  name: 'Form',
  props: {
    msg: String
  },
  data() {
    return {
      date_de_depart: "",
      date_de_retour: "",
      message: "",
      error: "",
    }
  },
  methods: {
    submit() {
      if (this.date_de_depart !== "" && this.message !== "") {
        axios.post('http://localhost/ownplugins_sandbox/wp-content/plugins/store-s-events/GetDataStoreEvents.php',  {
          request: 1,
          date_depart: this.date_de_depart,
          date_retour: this.date_de_retour ? this.date_de_retour : '',
          message: this.message
        })
        .then((response) => {
          console.log(response)
          console.log(response.status)
          if (response.status === 200) {
            console.log("success save")
            console.log(response.config.data)
          } else {
            console.log("failed save")
          }
        })
        .catch((error) => {
          console.log({error})
        });
      } else {
        console.log("veuillez remplir les champs obligatoire")
      }
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
  #submit {
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
