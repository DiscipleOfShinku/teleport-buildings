import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
  state: {
    buildings: null,
  },
  getters: {
    getBuilding(state) {
      return (id) => {
        if (!state.buildings)
          return null;

        const result = state.buildings.find(building => building.id == id);

        return result || null;
      }
    },
  },
  mutations: {
    setBuildings(state, buildings) {
      state.buildings = buildings;
    },
  },
})

export default store
