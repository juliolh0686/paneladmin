<script setup>
import { Head, Link } from '@inertiajs/vue3'

defineProps({
  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
  laravelVersion: {
    type: String,
    required: true,
  },
  phpVersion: {
    type: String,
    required: true,
  },
})

function handleImageError() {
  document.getElementById('screenshot-container')?.classList.add('!hidden')
  document.getElementById('docs-card')?.classList.add('!row-span-1')
  document.getElementById('docs-card-content')?.classList.add('!flex-row')
  document.getElementById('background')?.classList.add('!hidden')
}
</script>

<template>
  <Head title="Welcome" />
  <div class="flex flex-col h-dvh justify-center items-center bg-white">
    <h1 class="font-bold text-4xl my-5">Bienvenido a la Aplicación</h1>
    <nav v-if="canLogin" class="-mx-3 flex gap-6">
      <Link
        v-if="$page.props.auth.user"
        :href="route('dashboard')"
        class="bg-meta-5 rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-meta-2 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
      >
        Dashboard
      </Link>

      <template v-else>
        <Link
          :href="route('login')"
          class="bg-meta-5 rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-meta-2 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
          Log in
        </Link>

        <Link
          v-if="canRegister"
          :href="route('register')"
          class="bg-danger rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-meta-2 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
          Register
        </Link>
      </template>
    </nav>
  </div>
</template>
