<script setup lang="ts">
import { ref, defineProps } from 'vue'
import { Ref } from 'vue'
import DefaultLayout from '@/Layouts/Tailadmin/DefaultLayout.vue'
import DefaultCard from '@/Components/Tailadmin/Forms/DefaultCard.vue'
import Multiselect from 'vue-multiselect'

import Pagination from '@/Components/Pagination.vue'

//Importar Interfaces
import User from '@/Interfaces/IUser'
import Rol from '@/Interfaces/IRol'

const props = defineProps<{
  users: {
    type: User
    required: true
  }
  roles: {
    type: Rol
    required: true
  }
}>()

const updateRoles = async (id: number, roles: Rol[]) => {
  let valores: Ref<string[]> = ref([])

  roles.forEach((valor) => {
    valores.value.push(valor.name)
  })

  let fromData = new FormData()
  fromData.append('id', id.toString())
  fromData.append('roles', JSON.stringify(valores.value))

  const url = '/roles/update'

  const rawResponse = await fetch(url, {
    method: 'POST',
    headers: {
      Accept: 'application/json',
      'X-CSRF-TOKEN': (
        document.querySelector('meta[name="csrf-token"]') as HTMLMetaElement
      ).content,
    },
    body: fromData,
  })

  // const response = await rawResponse.json

  // console.log(response)
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
                      class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white"
                    >
                      Correo Electronico
                    </th>
                    <th
                      class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white"
                    >
                      Roles
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(user, index) in users.data" :key="index">
                    <td class="py-5 px-4 pl-9 xl:pl-11">
                      <h5 class="font-medium text-black dark:text-white">
                        {{ user.id }}
                      </h5>
                    </td>
                    <td class="py-5 px-4 pl-9 xl:pl-11">
                      <h5 class="font-medium text-black dark:text-white">
                        {{ user.name }}
                      </h5>
                    </td>
                    <td class="py-5 px-4">
                      <p class="text-black dark:text-white">{{ user.email }}</p>
                    </td>
                    <td class="py-5 px-4">
                      <Multiselect
                        v-model="user.roles"
                        placeholder="Agregar un Rol"
                        label="name"
                        track-by="id"
                        :hide-selected="true"
                        :searchable="false"
                        :showLabels="false"
                        :options="roles"
                        :multiple="true"
                        :taggable="true"
                        @update:modelValue="updateRoles(user.id, user.roles)"
                      ></Multiselect>
                    </td>
                  </tr>
                </tbody>
              </table>
              <Pagination :data="users" />
            </div>
          </div>
        </DefaultCard>
      </div>
    </div>
  </DefaultLayout>
</template>
