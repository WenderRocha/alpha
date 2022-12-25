<template>
    <AuthenticatedLayout title="Dashboard">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Dashboard
                </h2>

                <Button @click="showModal" class="items-center gap-2 max-w-xs" v-slot="{ iconSizeClasses }">
                    <PlusCircleIcon aria-hidden="true" :class="iconSizeClasses"/>
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
                            <Button @click="showModalDelete" iconOnly variant="danger" title="Apagar"
                                    class="justify-center gap-2">
                                <TrashIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true"/>
                                <span class="sr-only">Apagar</span>
                            </Button>
                        </div>
                        <div>
                            <Button iconOnly variant="info" title="Visualizar" class="justify-center gap-2">
                                <EyeIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true"/>
                                <span class="sr-only">Receita</span>
                            </Button>
                        </div>
                        <div>
                            <Button iconOnly title="Estudar" class="justify-center gap-2" v-slot="{ iconSizeClasses }">
                                <AcademicCapIcon aria-hidden="true" :class="iconSizeClasses"/>
                                <span class="sr-only">Estudar</span>
                            </Button>
                        </div>
                    </div>
                </the-card>


            </div>
        </div>

        <Modal v-if="isShowModal" @close="closeModal">
            <template #header>
                <div class="flex items-center text-lg">
                    Novo Operacional
                </div>
            </template>
            <template #body>
                <div class="mb-6">
                    <Input placeholder="Ex: Suporte e Resistência" label="Nome"/>
                </div>
                <div class="mb-6">
                    <Input placeholder="Link para video no Youtube" label="Link"/>
                </div>
                <div class="mb-6">

                    <label for="message"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
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

                    <Button v-if="operationalForm.processing" :disabled="operationalForm.processing"
                            class="items-center gap-2 max-w-xs" v-slot="{ iconSizeClasses }">
                        <div class="flex items-center">
                            <spinner class="mr-2" color="white" size="8"/>
                            <span>Aguarde...</span>
                        </div>
                    </Button>

                    <Button v-else @click="submitOperationalForm" class="items-center gap-2 max-w-xs"
                            v-slot="{ iconSizeClasses }">
                        <CheckIcon aria-hidden="true" :class="iconSizeClasses"/>
                        <span>Adicionar</span>
                    </Button>

                </div>
            </template>
        </Modal>


        <Modal size="md" v-if="isShowModalDelete" @close="closeModalDelete">
            <template #body>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Deseja realmente excluir o
                        operacional?
                    </h3>
                    <button data-modal-toggle="popup-modal" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Sim, Deletar
                    </button>
                    <button @click="closeModalDelete" data-modal-toggle="popup-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Não,
                        cancelar
                    </button>
                </div>
            </template>
        </Modal>


    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import {TheCard, Modal, Input, Progress, Badge, Alert, Toast, Spinner} from 'flowbite-vue'
import Button from '@/Components/Button.vue'
import {computed, onBeforeUnmount, onMounted, reactive, ref, watch} from 'vue'
import {useForm} from "@inertiajs/inertia-vue3";
import {
    CheckIcon,
    EyeIcon,
    AcademicCapIcon,
    MinusCircleIcon,
    PlusCircleIcon,
    ArrowCircleRightIcon,
    PresentationChartLineIcon,
    CalendarIcon,
    TrashIcon
} from "@heroicons/vue/outline";

import {
    handleScroll,
    isDark,
    scrolling,
    toggleDarkMode,
    sidebarState,
} from '@/Composables'

import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();

const operationalForm = useForm({})

function submitOperationalForm() {
    operationalForm.post('/operacional', {

        onSuccess: (page) => {
            $toast.success('Cadastrado com sucesso!', {
                // override the global option
                position: 'top-right'
            })
        },

        onError: (errors) => {
            $toast.error('Oops, tente novamente mais tarde...', {
                // override the global option
                position: 'top-right'
            })
        },
    })
}

const isShowModalDelete = ref(false)

function closeModalDelete() {
    isShowModalDelete.value = false
}

function showModalDelete() {
    isShowModalDelete.value = true
}

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

