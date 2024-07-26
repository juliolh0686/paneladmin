<script setup lang="ts">
import { ref, defineProps } from 'vue'
import { Ref } from 'vue'
import DefaultLayout from '@/Layouts/Tailadmin/DefaultLayout.vue'
import DefaultCard from '@/Components/Tailadmin/Forms/DefaultCard.vue'
import multiselect from 'vue-multiselect'

import Pagination from '@/Components/Pagination.vue'
import MultiSelect from '@/Components/Tailadmin/Forms/MultiSelect.vue'

import { router } from '@inertiajs/vue3'

//Importar Interfaces
import Permission from '@/Interfaces/IPermission'
import Rol from '@/Interfaces/IRol'

// Definir propiedades
const props = defineProps<{
  roles: {
    data: Rol[]
    meta: {
      from: number
      to: number
      total: number
      links: Array<{
        url: string | null
        label: string
        active: boolean
      }>
    }
  }
  permission: Permission[]
}>()

const updatePermissions = async (id: number, permission: Permission[]) => {
  // let valores: Ref<string[]> = ref([])
  // permission.forEach((valor) => {
  //   valores.value.push(valor.name)
  // })
  // let fromData = new FormData()
  // fromData.append('id', id.toString())
  // fromData.append('permissions', JSON.stringify(valores.value))
  // const url = '/permissions/update'
  // const rawResponse = await fetch(url, {
  //   method: 'POST',
  //   headers: {
  //     Accept: 'application/json',
  //     'X-CSRF-TOKEN': (
  //       document.querySelector('meta[name="csrf-token"]') as HTMLMetaElement
  //     ).content,
  //   },
  //   body: fromData,
  // })
}
</script>

<template>
  <DefaultLayout>
    <div class="grid grid-cols-1 gap-9 sm:grid-cols-1">
      <div class="flex flex-col gap-9">
        <DefaultCard cardTitle="Usuarios">
          <div
            class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1"
          >
            <div class="max-w-full overflow-x-auto">
              <table class="w-full table-auto">
                <thead>
                  <tr class="bg-gray-2 text-left dark:bg-meta-4">
                    <th
                      class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11"
                    >
                      N°
                    </th>
                    <th
                      class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white"
                    >
                      Nombre
                    </th>
                    <th
                      class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white"
                    >
                      Fecha Creación
                    </th>
                    <th
                      class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white"
                    >
                      Roles
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(rol, index) in roles.data" :key="index">
                    <td class="py-5 px-4 pl-9 xl:pl-11">
                      <h5 class="font-medium text-black dark:text-white">
                        {{ rol.id }}
                      </h5>
                    </td>
                    <td class="py-5 px-4 pl-9 xl:pl-11">
                      <h5 class="font-medium text-black dark:text-white">
                        {{ rol.name }}
                      </h5>
                    </td>
                    <td class="py-5 px-4 pl-9 xl:pl-11">
                      <h5 class="font-medium text-black dark:text-white">
                        {{ rol.created_at }}
                      </h5>
                    </td>
                    <td class="py-5 px-4">
                      <MultiSelect></MultiSelect>
                      <!-- <multiselect
                        v-model="rol.permissions"
                        placeholder="Agregar un Rol"
                        label="name"
                        track-by="id"
                        :hide-selected="true"
                        :searchable="false"
                        :showLabels="false"
                        :options="permission"
                        :multiple="true"
                        :taggable="true"
                        @update:model-value="
                          updatePermissions(rol.id, rol.permissions)
                        "
                      ></multiselect> -->
                    </td>
                  </tr>
                </tbody>
              </table>
              <Pagination :data="roles" urlPage="roles" />
            </div>
          </div>
        </DefaultCard>
      </div>
    </div>
  </DefaultLayout>
</template>
