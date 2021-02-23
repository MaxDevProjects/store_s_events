<template>
    <ul>
      <li
          v-for="item in menuItems" :key="item"
          @click="isActive = item"
          :class="{isActive : isActive === item}"
      >{{item}}</li>
    </ul>
    <div v-if="isActive === 'Events' ">
        <Form/>
    </div>
    <div v-if="isActive === 'Historic' ">
        <Historic/>
    </div>
</template>

<script>
import Form from "@/components/Form";
import Historic from "@/components/Historic";
export default {
    name: 'Pagination',
  components: {Historic, Form},
  props: {
        current: String
    },
  data() {
      return {
        menuItems: ['Events','Historic'],
        isActive: "Events",
      }
  }
}
</script>

<style scoped>
    ul {
        display: flex;
        list-style: none;
        margin: 0 0 0 4px;
        padding: 0;
    }
    li {
        margin: 0;
        padding: 6px 12px;
        border: 1px solid #007cba;
        border-bottom: none;
    }

    li{
        text-decoration: none;
        color: #007cba;
        font-size: .8rem;
        cursor: pointer;
    }

    li.isActive {
        background: #f6f6f6;
        box-shadow: 4px 0 6px #b4b4b4;
        z-index: 99;
    }
</style>