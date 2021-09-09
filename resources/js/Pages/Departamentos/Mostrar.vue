<template>
  <!-- creo un componente para el header -->
  <app-layout>
    <template #header>
      <h1 class="text-center text-2xl font-bold leading-7 text-grey-500 text" >Nomenclador de Departamentos</h1>
    </template>

    <div class=" flex-auto py-6 mt-1">
      <div class="mx-auto sm:px-6 lg:px-8">

        <div class="overflow-hidden shadow-x1 sm:rounded-lg">

          <Link
            :href="route('departamentos.create')"
            class="py-2 px-4 bg-purple-500 hover:bg-purple-700 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-opacity-75"
            type="button">Nuevo
          </Link>

           <!-- component -->
          <table class="w-4/5 min-w-max table-auto mt-5">
            <thead class="bg-grey-100">
              <tr class="text-grey-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-center w-12 ">Id</th>
                <th class="py-3 px-6 text-left w-32">Descripcion</th>
                <th class="py-3 px-6 text-center w-12">Estado</th>
                <th class="py-3 px-6 text-left w-12">Acciones</th>
              </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
              <tr v-for="departamento in departamentos" :key="departamento.id">
                <td class="py-3 px-6 text-left whitespace-nowrap text-center">
                      <span class="font-medium">{{departamento.id}}</span>
                </td>
                <td class="py-3 px-6 text-left whitespace-nowrap">
                      <span class="font-medium">{{departamento.nombre}}</span>
                </td>
                <td class="py-3 px-6 text-center whitespace-nowrap  text-center">
                      <span v-if="departamento.estado=='1'" class="font-medium bg-light-green-500 rounded-lg text-white">&nbsp&nbspHabilitado&nbsp&nbsp  </span>
                      <span v-else class="font-medium bg-red-300 rounded-lg text-white">&nbsp&nbspInabilitado&nbsp&nbsp</span>
                </td>
                <td class="py-3 px-6 text-center flex m-2">
                  <Link
                      :href="route('departamentos.edit', departamento.id)"
                      class="w-7 mr-2 transform hover:text-purple-500 hover:scale-110 flex item-center justify-center placeholder='GGGG'">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                      </svg>
                  </Link>

                  <Link
                      :href="route('departamentos.edit', departamento.id)"
                      class="w-7 mr-2 transform hover:text-purple-500 hover:scale-110 flex item-center justify-center placeholder='GGGG'">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />

                      </svg>
                  </Link>

                  <Link
                      :href="route('departamentos.destroy', departamento.id)"
                      method = "delete"
                      class="w-7 mr-2 transform hover:text-purple-500 hover:scale-110 flex item-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                  </Link>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
/* Importo el esqueleto de la SPA */
import AppLayout from "@/Layouts/AppLayout";
import { Link } from '@inertiajs/inertia-vue3'

export default {

  props : {
    /* indico que vamos a trabajar con un array */
    departamentos: Array

  },
  components:{
    /* pongo los componentes que voy a usar en estas vista*/
    AppLayout,
    Link
  }

}
</script>
