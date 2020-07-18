<template>
  <div class="edit">
    <h1>{{ $t('editBuilding') }}</h1>
    <BuildingEditor :building-id="$route.params.id"/>
  </div>
</template>

<script>
// @ is an alias to /src
import BuildingEditor from '@/components/BuildingEditor.vue'

export default {
  name: 'Edit',
  components: {
    BuildingEditor
  },
}
</script>
