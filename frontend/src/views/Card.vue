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
</style>
