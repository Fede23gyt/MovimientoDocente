<template>
  <app-layout>

    <!-- component -->
<!--     <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">Actualizar datos de Departamento</h2>
    </template>
 -->
    <template #header>
      <h1 class="text-center text-2xl font-bold leading-7 text-grey-500 text" >Actualizar datos de Departamento</h1>
    </template>

    <div class="flex flex-col items-center justify-center mt-2 mb-5 ">
      <div class="flex flex-col rounded-lg shadow-xl w-3/4 md:w-3/4 lg:w-1/2 mx-20">
        <form @submit.prevent="submit" class="mb-6 w-3/4">

          <div class="grid grid-cols-1 mt-5 mx-7 w-5/6">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
            <input id="nombre" v-model="form.nombre"
              class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2
                    focus:ring-purple-600 focus:border-transparent md:w-full w-28"
              type="text"
              placeholder="Nombre de departamento"/>
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7 w-2/3 bg-red-1">
            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Estado</label>
            <select  v-model="form.estado" class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
              <option value="1">Habilitado</option>
              <option value="0">Inhabilitado</option>
            </select>
          </div>

          <div class='flex justify-end md:gap-8 gap-4 pt-5 pb-5 pr-5'>
            <Link
                :href="route('departamentos.index')"
                class='w-auto bg-blue-grey-700 hover:bg-grey-900 rounded-lg shadow-xl font-medium text-white px-4 py-2' type="button">Cancelar
            </Link>

            <button
                type="submit"
                class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                Guardar
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
  components:{
    AppLayout, /*es el componente base */
    Link
  },
    props: ["escuela"],

  data(){
    return{
      form:{
        nombre: this.$props.escuela.nombre,
        numero: this.$props.escuela.numero,

      },
    };
  },
  methods:{

     submit() {

      this.$inertia.put(
          route("departamentos.update", this.$props.departamento.id),this.form );
      },
    },
};
</script>


