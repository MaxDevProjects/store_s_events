<template>
  <div v-if="success">
    <p class="color-success">
      ✔ your event has been registered
    </p>
  </div>
    <form>
      <div>
        <label for="date_depart">Start: <span class="missing" v-if="missing">missing fields</span></label>
        <input type="date" name="date_depart" id="date_depart" v-model="date_de_depart">
        <label for="date_retour">Return:</label>
        <input type="date" name="date_retour" id="date_retour" v-model="date_de_retour">
        <label for="message">Message: <span class="missing" v-if="missing">missing fields</span></label>
        <textarea name="message" id="message" cols="30" rows="10" v-model="message"></textarea>
      </div>
      <input type="button" id="submit" @click="submit" value="Send event"/>
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
      success: false,
      missing: false
    }
  },
  methods: {
    submit() {
      if (this.date_de_depart !== "" && this.message !== "" && this.message.length < 255) {
        axios.post('http://localhost/ownplugins_sandbox/wp-content/plugins/store-s-events/GetDataStoreEvents.php?',null, {
          params: {
            request: 1,
            date_depart: this.date_de_depart,
            date_retour: this.date_de_retour ? this.date_de_retour : '',
            message: this.message
          }
        })
        .then((response) => {
          if (response.status === 200) {
            this.success = true
            this.date_de_depart = ""
            this.date_de_retour = ""
            this.message = ""
          } else {
            this.error(`error ${response.statusText}`)
          }
        })
        .catch((error) => {
          console.log({error})
        });
      } else {
        if (!this.date_de_depart) this.missing = true
        if (!this.message) this.missing = true
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
  .color-success {
    background: #2ebf7b;
    color: #fff;
    width: fit-content;
    padding: 12px;
    border-radius: 8px;
  }
  .missing {
    color: #bf2e2e;
    font-weight: bold;
  }
</style>
