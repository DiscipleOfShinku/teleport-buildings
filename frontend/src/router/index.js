import Vue from 'vue'
import VueRouter from 'vue-router'
import Add from '../views/Add.vue'
import Edit from '../views/Edit.vue'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    component: Home,
  },
  {
    path: '/add',
    component: Add,
  },
  {
    path: '/edit/:id',
    name: 'edit',
    component: Edit,
  },
]

const router = new VueRouter({
  routes
})

export default router
