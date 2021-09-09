<template>
  <app-layout>
    <template #header>
      <h1 class="text-center text-2xl font-bold leading-7 text-grey-500 text" >Creacion de Escuelas</h1>
    </template>
    <!-- component -->

    <div class="flex  bg-gray-200 items-center justify-center  mt-5 mb-0 ">
      <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12 lg:w-1/2">

        <form @submit.prevent="submit" class="mb-6">



          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1 w-4/12">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nro</label>
              <input id="numero" v-model="form.numero"
              class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
              type="text" placeholder="Nro" />
            </div>
            <div class="grid grid-cols-1 left -ml-48">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold text-left">Nombre</label>
              <input  id="nombre" v-model="form.nombre"
              class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
              type="text" placeholder="Nombre de la escuela" />
            </div>
          </div>

          <!--
          <div class="grid grid-cols-1 mt-5 mx-7 w-5/6">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
            <input id="nombre" v-model="form.nombre"
              class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2
                    focus:ring-purple-600 focus:border-transparent md:w-full w-2/5"
              type="text"
              placeholder="Nombre de escuela"/>
          </div>
          -->

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Departamento</label>
            <select v-model="form.departamento_id"
              class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent w-2/5">
              <option
                v-for='departamento in list_departamentos' :value='departamento.id'>{{ departamento.nombre }}
              </option>

            </select>
          </div>

          <div class='flex justify-end md:gap-8 gap-4 pt-5 pb-5 pr-5'>
            <Link
                :href="route('escuelas.index')"
                class='w-auto bg-grey-700 hover:bg-grey-900 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="button">Cancelar
            </Link>
            <button
                type="submit"
                class='w-auto bg-purple-300 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Guardar
            </button>
          </div>
        </form>

      </div>
    </div>

  </app-layout>

</template>
<script>
import AppLayout from "@/Layouts/AppLayout";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

export default {

  props: {
    list_departamentos: {
      type: Array,
      default: () => []
    }
  },

  components:{
    AppLayout, /*es el componente base */
    Link
  },

  data(){
    return{
      form:{
        numero:'',
        nombre: '',
        departamento_id: null
      }
    }
  },
  methods:{
   submit(){

      this.$inertia.post(route('escuelas.store'), this.form);

    },

  },

};
</script>
