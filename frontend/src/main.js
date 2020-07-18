import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import translationsRu from './i18n/ru.json'
import { ValidationObserver, ValidationProvider, extend, localize } from 'vee-validate'
import { required, max, min_value } from 'vee-validate/dist/rules'
import ru from 'vee-validate/dist/locale/ru'
import VueResource from 'vue-resource'
import vuexI18n from 'vuex-i18n'
import Vuex from 'vuex'

Vue.use(VueResource)
Vue.use(Vuex)
Vue.use(vuexI18n.plugin, store)

Vue.i18n.add('ru', translationsRu)
Vue.i18n.set('ru')

Vue.component('ValidationObserver', ValidationObserver)
Vue.component('ValidationProvider', ValidationProvider)

// vee-validate rules
extend('required', required)
extend('max', max)
extend('min_value', min_value)
// vee-validate localization
localize('ru', ru)

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
