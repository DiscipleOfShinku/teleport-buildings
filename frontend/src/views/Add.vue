<template>
  <div class="add">
    <h1>{{ $t('newBuilding') }}</h1>
    <BuildingEditor/>
  </div>
</template>

<script>
// @ is an alias to /src
import BuildingEditor from '@/components/BuildingEditor.vue'

export default {
  name: 'Add',
  components: {
    BuildingEditor
  },
}
</script>
