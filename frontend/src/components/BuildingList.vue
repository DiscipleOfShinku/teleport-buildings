<template>
  <div class="building-list">
    <progress v-if="!buildings"/>
    <template v-else>
      <Card v-for="building in buildings"
            :key="building.id"
            :building="building">
      </Card>
    </template>
  </div>
</template>

<script>
// @ is an alias to /src
import Card from '@/views/Card.vue'

export default {
  name: 'BuildingList',
  components: {
    Card,
  },
  computed: {
    buildings() {
      return this.$store.state.buildings;
    },
  },
  methods: {
    getBuildings() {
      this.$http.get('/building')
        .then(response => this.$store.commit('setBuildings', response.data))
        .catch(err => console.log(err))
    },
  },
  mounted() {
    this.getBuildings();
  },
}
</script>

<style scoped>
.building-list {
  display: flex;
  flex-direction: column;
  align-items: center;
}
</style>
