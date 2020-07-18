<template>
  <div class="card">
    <p>{{ $t('street') }}: {{ building.street }}</p>
    <p>{{ $t('number') }}: {{ building.number }}</p>
    <p>{{ $t('floors') }}: {{ building.floors }}</p>
    <p>{{ $t('space') }}: {{ building.space }}</p>
    <p>{{ $t('buildDate') }}: {{ building.build_date }}</p>
    <button @click="edit">{{ $t('edit') }}</button>
  </div>
</template>

<script>
export default {
  name: 'Card',
  props: {
    building: {
      type: Object,
      required: true,
    },
  },
  methods: {
    edit() {
      this.$router.push({name: 'edit', params: {id: this.building.id}});
    },
  },
}
</script>

<style>
.card {
  margin: 10px;
  width: min-content;
  padding: 20px 20px 0;
  display: grid;
  grid-template: repeat(3, auto) / 300px 300px 150px;
  grid-gap: 20px 0;
  justify-items: left;
  background: #f0f0f0;
}
</style>
