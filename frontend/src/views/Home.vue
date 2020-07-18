<template>
  <div class="home">
    <h1>{{ $t('buildingList') }}</h1>
    <button @click="addBuilding">{{ $t('addBuilding') }}</button>
    <BuildingList/>
  </div>
</template>

<script>
// @ is an alias to /src
import BuildingList from '@/components/BuildingList.vue'

export default {
  name: 'Home',
  components: {
    BuildingList
  },
  methods: {
    addBuilding() {
      this.$router.push('add');
    },
  },
}
</script>
