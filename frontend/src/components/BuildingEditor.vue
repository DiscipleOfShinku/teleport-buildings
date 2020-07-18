<template>
  <ValidationObserver class="building-editor" v-slot="{ handleSubmit }">
    <form @submit.prevent="handleSubmit(onSubmit)">
      <p>{{ $t('street') }}</p>
      <ValidationProvider
          tag="div"
          class="field"
          :name="$t('street')"
          rules="required|max:255"
          v-slot="{ errors }">
        <input v-model="building.street" type="text" />
        <div>{{ errors[0] }}</div>
      </ValidationProvider>

      <p>{{ $t('number') }}</p>
      <ValidationProvider
          tag="div"
          class="field"
          :name="$t('number')"
          rules="required|max:255"
          v-slot="{ errors }">
        <input v-model="building.number" type="text" />
        <div>{{ errors[0] }}</div>
      </ValidationProvider>

      <p>{{ $t('floors') }}</p>
      <ValidationProvider
          tag="div"
          class="field"
          :name="$t('floors')"
          rules="required|min_value:1"
          v-slot="{ errors }">
        <input v-model="building.floors" type="number" />
        <div>{{ errors[0] }}</div>
      </ValidationProvider>

      <p>{{ $t('space') }}</p>
      <ValidationProvider
          tag="div"
          class="field"
          :name="$t('space')"
          rules="required|min_value:0"
          v-slot="{ errors }">
        <input v-model="building.space" type="number" step="0.1" />
        <div>{{ errors[0] }}</div>
      </ValidationProvider>

      <p>{{ $t('buildDate') }}</p>
      <ValidationProvider
          tag="div"
          class="field"
          :name="$t('buildDate')"
          rules="required"
          v-slot="{ errors }">
        <input v-model="building.build_date" type="date" />
        <div>{{ errors[0] }}</div>
      </ValidationProvider>

      <button @click="cancel">{{ $t('cancel') }}</button>
      <button type="submit" :disabled="isSaving">{{ $t('save') }}</button>
    </form>
  </ValidationObserver>
</template>

<script>
  export default {
    name: 'building-editor',
    props: {
      buildingId: Number,
    },
    data() {
      return {
        building: {},
        isSaving: false,
      };
    },
    methods: {
      getBuilding() {
        const building = this.$store.getters.getBuilding(this.buildingId);

        if (!building)
          return this.$router.push('/');

        this.building = {...building};
      },
      cancel() {
        this.$router.push('/');
      },
      onSubmit() {
        this.isSaving = true;

        const body = this.building;
        body._csrf = document.getElementsByName('csrf-token')[0]
                             .getAttribute('content');

        (this.buildingId ? this.update(body) : this.create(body))
          .catch(err => console.log(err))
          .finally(() => this.$router.push('/'))
      },
      create(body) {
        return this.$http.post('/building/create', body)
      },
      update(body) {
        const config = {params: {id: this.buildingId}};

        return this.$http.patch('/building/update', body, config)
      },
    },
    mounted() {
      if (this.buildingId)
        this.getBuilding();
    },
  };
</script>

<style scoped>
.field {
  margin-bottom: 20px;
}
button {
  margin: 10px;
}
</style>

