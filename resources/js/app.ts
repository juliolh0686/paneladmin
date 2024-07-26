import './bootstrap'
import '../css/app.css'
import './assets/css/satoshi.css'
import './assets/css/style.css'
import 'jsvectormap/dist/jsvectormap.min.css'
import 'flatpickr/dist/flatpickr.min.css'
import 'vue-multiselect/dist/vue-multiselect.css'
import '@vueform/multiselect/themes/default.css'

import { createApp, h, DefineComponent } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { ZiggyVue } from '../../vendor/tightenco/ziggy/src/js'
import VueApexCharts from 'vue3-apexcharts'

import { createPinia } from 'pinia'
const pinia = createPinia()

const appName = import.meta.env.VITE_APP_NAME || 'Laravel'

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) =>
    resolvePageComponent(
      `./Pages/${name}.vue`,
      import.meta.glob<DefineComponent>('./Pages/**/*.vue')
    ),
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .use(pinia)
      .use(VueApexCharts)
      .mount(el)
  },
  progress: {
    color: '#4B5563',
  },
})
