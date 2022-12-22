<template>
  <AuthenticatedLayout title="Dashboard">
    <template #header>
      <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <h2 class="text-xl font-semibold leading-tight">
          Dashboard
        </h2>

        <Button @click="showModal" class="items-center gap-2 max-w-xs" v-slot="{ iconSizeClasses }">
          <PlusCircleIcon aria-hidden="true" :class="iconSizeClasses" />
          <span>Novo</span>
        </Button>
      </div>
    </template>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
      <div class="grid md:grid-cols-3 gap-4">
        <the-card>
          <img src="/img/icon-king.png" alt="">
          <apexchart type="donut" :options="options" :series="series"></apexchart>
          <h5 class="mb-2 text-center text-1xl font-semibold tracking-tight text-gray-900 dark:text-white">
            Retração M5
          </h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum animi</p>
          <div class="mt-5 flex justify-around">
            <div>
              <Button @click="showModal" iconOnly variant="danger" :size="size" title="Apagar"
                class="justify-center gap-2">
                <TrashIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
                <span class="sr-only">Apagar</span>
              </Button>
            </div>
            <div>
              <Button iconOnly variant="info" :size="size" title="Visualizar" class="justify-center gap-2">
                <EyeIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
                <span class="sr-only">Receita</span>
              </Button>
            </div>
            <div>
              <Button iconOnly :variant="variant" :size="size" title="Estudar" class="justify-center gap-2"
                v-slot="{ iconSizeClasses }">
                <AcademicCapIcon aria-hidden="true" :class="iconSizeClasses" />
                <span class="sr-only">Estudar</span>
              </Button>
            </div>
          </div>
        </the-card>
        <the-card>
          <img src="/img/icon-king.png" alt="">
          <apexchart type="donut" :options="options" :series="series"></apexchart>
          <h5 class="mb-2 text-center text-1xl font-semibold tracking-tight text-gray-900 dark:text-white">
            Retração M5
          </h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum animi</p>
          <div class="mt-5 flex justify-around">
            <div>
              <Button @click="showModal" iconOnly variant="danger" :size="size" title="Apagar"
                class="justify-center gap-2">
                <TrashIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
                <span class="sr-only">Apagar</span>
              </Button>
            </div>
            <div>
              <Button iconOnly variant="info" :size="size" title="Visualizar" class="justify-center gap-2">
                <EyeIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
                <span class="sr-only">Receita</span>
              </Button>
            </div>
            <div>
              <Button iconOnly :variant="variant" :size="size" title="Estudar" class="justify-center gap-2"
                v-slot="{ iconSizeClasses }">
                <AcademicCapIcon aria-hidden="true" :class="iconSizeClasses" />
                <span class="sr-only">Estudar</span>
              </Button>
            </div>
          </div>
        </the-card>
        <the-card>
          <img src="/img/icon-king.png" alt="">
          <apexchart type="donut" :options="options" :series="series"></apexchart>
          <h5 class="mb-2 text-center text-1xl font-semibold tracking-tight text-gray-900 dark:text-white">
            Retração M5
          </h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum animi</p>
          <div class="mt-5 flex justify-around">
            <div>
              <Button @click="showModal" iconOnly variant="danger" :size="size" title="Apagar"
                class="justify-center gap-2">
                <TrashIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
                <span class="sr-only">Apagar</span>
              </Button>
            </div>
            <div>
              <Button iconOnly variant="info" :size="size" title="Visualizar" class="justify-center gap-2">
                <EyeIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
                <span class="sr-only">Receita</span>
              </Button>
            </div>
            <div>
              <Button iconOnly :variant="variant" :size="size" title="Estudar" class="justify-center gap-2"
                v-slot="{ iconSizeClasses }">
                <AcademicCapIcon aria-hidden="true" :class="iconSizeClasses" />
                <span class="sr-only">Estudar</span>
              </Button>
            </div>
          </div>
        </the-card>
      </div>
    </div>

    <Modal :size="size" v-if="isShowModal" @close="closeModal">
      <template #header>
        <div class="flex items-center text-lg">
          Novo Operacional
        </div>
      </template>
      <template #body>
        <div class="mb-6">
          <Input placeholder="Ex: Suporte e Resistência" label="Nome" />
        </div>
        <div class="mb-6">
          <Input placeholder="Link para video no Youtube" label="Link" />
        </div>
        <div class="mb-6">

          <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
          <textarea id="message" rows="4"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Descreva seu operacional..."></textarea>

        </div>
      </template>
      <template #footer>
        <div class="flex justify-between">
          <button @click="closeModal" type="button"
            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
            Cancelar
          </button>
          <Button @click="closeModal" class="items-center gap-2 max-w-xs" v-slot="{ iconSizeClasses }">
            <CheckIcon aria-hidden="true" :class="iconSizeClasses" />
            <span>Adicionar</span>
          </Button>

        </div>
      </template>
    </Modal>



  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { TheCard, Modal, Input, Progress, Badge, Alert, Toast  } from 'flowbite-vue'
import Button from '@/Components/Button.vue'
import { computed, onBeforeUnmount, onMounted, reactive, ref, watch } from 'vue'
import { useForm } from "@inertiajs/inertia-vue3";
import { CheckIcon, EyeIcon, AcademicCapIcon, MinusCircleIcon, PlusCircleIcon, ArrowCircleRightIcon, PresentationChartLineIcon, CalendarIcon, TrashIcon } from "@heroicons/vue/outline";

import {
  handleScroll,
  isDark,
  scrolling,
  toggleDarkMode,
  sidebarState,
} from '@/Composables'

const isShowModal = ref(false)
function closeModal() {
  isShowModal.value = false
}
function showModal() {
  isShowModal.value = true
}

//PIE CHART
let options = reactive({
  labels: ['Vitorias', 'Derrotas'],
  colors: ['#00e396', '#ff788f'],
  legend: {
    show: false
  }

});
const series = [75, 25]
//PIE CHART

</script>

