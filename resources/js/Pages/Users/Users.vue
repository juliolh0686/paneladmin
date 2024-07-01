<script setup lang="ts">
import { ref, defineProps, onMounted } from 'vue'
import DefaultLayout from '@/Layouts/Tailadmin/DefaultLayout.vue'
import DefaultCard from '@/Components/Tailadmin/Forms/DefaultCard.vue'
import Multiselect from 'vue-multiselect'

import Pagination from '@/Components/Pagination.vue'

const props = defineProps<{
  users: {
    type: Object
    required: true
  }
  roles: {
    type: Object
    required: true
  }
}>()

const addTag = (newTag) => {
  const tag = {
    name: newTag,
    code: newTag.substring(0, 2) + Math.floor(Math.random() * 10000000),
  }
  this.options.push(tag)
  this.value.push(tag)
}

const updateRoles = async () => {
  try {
    const response = await fetch('roles/update', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      },
      body: JSON.stringify(users.roles),
    });

    if (!response.ok) {
      throw new Error('Network response was not ok');
    }

    const data = await response.json();
    users.data = data;

  } catch (error) {
    console.error('There was a problem with the fetch operation:', error);
  }
};

// const updateRoles = (id: number, roles = []) => {
//   let valores = ref([])
//   roles.forEach((valor = []) => {
//     console.log(valor)
//     //valores.value.push(valor.name)
//   })

  // axios
  //   .put('roles/update', {
  //     id: id,
  //     roles: valores,
  //   })
  //   .then(function (response) {})
  //   .catch(function (error) {
  //     console.log(error)
  //   })
}

//console.log(props.users.data)
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
                        @tag="addTag"
                        @select="updateRoles(user.id, user.roles)"
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
