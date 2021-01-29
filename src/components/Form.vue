<template>
    <form>
      <input type="checkbox" name="inHoliday" id="inHoliday" v-model="checked">
      <label for="inHoliday">I'm going on vacation</label>
      <p v-if="error">{{error}}</p>
      <div v-if="checked">
        <label for="depart">Date de départ:</label>
        <input type="date" name="depart" id="depart" v-model="date_de_depart">
        <label for="retour">Date de retour:</label>
        <input type="date" name="retour" id="retour" v-model="date_de_retour">
        <label for="message">Informer mes clients :</label>
        <textarea name="message" id="message" cols="30" rows="10" v-model="message"></textarea>
      </div>
      <a @click="submit">Enregistrer les modifications</a>
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
  },
  mounted() {
    let jsonStringFromLS = localStorage.getItem('data');
    this.checked = JSON.parse(jsonStringFromLS).state === true ? 'checked' : ''
    console.log(JSON.parse(jsonStringFromLS).state)
  },
  watch: {
    checked(newValue = !this.checked ? '' : 'checked', date_d, date_r = null, msg) {
      this.checked = newValue
      this.date_de_depart = date_d
      this.date_de_retour = date_r
      this.message = msg
    }
  },
  methods: {
    submit() {
      if (this.checked) {
        if (this.date_de_depart && this.message) {
          this.arr.push({
            state: this.checked,
            date_de_depart: this.date_de_depart,
            date_de_retour: this.date_de_retour,
            message: this.message
          })
          return this.save()
        } else {
          this.error = "il y a une erreur"
        }
      }
    },
    save() {
      //TODO: injection des données data dans la base de donnée
      //création de cette base de données ==>  https://codex.wordpress.org/Creating_Tables_with_Plugins
      localStorage.setItem("data", JSON.stringify(this.arr[0]))
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
