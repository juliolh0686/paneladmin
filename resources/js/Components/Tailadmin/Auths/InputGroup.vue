<script setup lang="ts">
import { onMounted, ref } from 'vue'

const props = defineProps({
  label: String,
  customClasses: String,
  type: String,
  required: {
    type: Boolean,
    default: false,
  },
  placeholder: String,
})

const model = defineModel<string>({ required: true })

const input = ref<HTMLInputElement | null>(null)

onMounted(() => {
  if (input.value?.hasAttribute('autofocus')) {
    input.value?.focus()
  }
})

defineExpose({ focus: () => input.value?.focus() })
</script>

<template>
  <div class="mb-4">
    <label class="mb-2.5 block font-medium text-black dark:text-white">
      {{ props.label }}
    </label>
    <div class="relative">
      <input
        :type="props.type"
        class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary text-black dark:text-white"
        v-model="model"
        ref="input"
        :placeholder="props.placeholder"
      />
      <span class="absolute right-4 top-4">
        <slot></slot>
      </span>
    </div>
  </div>
</template>
