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

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Ativo
                        </th>

                        <th scope="col" class="py-3 px-6">
                            Ação
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Apple MacBook Pro 17"
                        </th>

                        <td class="py-4 px-6">
                            <div class="mt-5 flex gap-3">
                                <div>
                                    <Button iconOnly variant="info" title="Editar" class="justify-center gap-2">
                                        <PencilAltIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true"/>
                                        <span class="sr-only">Receita</span>
                                    </Button>
                                </div>
                                <div>
                                    <Button @click="showModalDelete" iconOnly variant="danger" title="Apagar"
                                            class="justify-center gap-2" v-slot="{ iconSizeClasses }">
                                        <TrashIcon aria-hidden="true" :class="iconSizeClasses"/>
                                        <span class="sr-only">Apagar</span>
                                    </Button>
                                </div>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div>

        <Modal v-if="isShowModal" @close="closeModal">
            <template #header>
                <div class="flex items-center text-lg">
                    <div class="mr-3">Novo ativo</div>
                    <div class="text-sm">{{ assetsForm.asset1.toUpperCase() }} <span class="uppercase">{{
                            (assetsForm.asset1 !=
                                '') ? 'x' : ''
                        }}</span> {{ assetsForm.asset2.toUpperCase() }}
                    </div>
                </div>
            </template>
            <template #body>

                <div class="grid md:grid-cols-2 gap-4">
                    <div class="mb-6">
                        <Input v-model="assetsForm.asset1" :disabled="assetsForm.processing" placeholder="Ex: EUR"
                               label="Ativo"/>
                    </div>
                    <div class="mb-6">
                        <Input v-model="assetsForm.asset2" :disabled="assetsForm.processing" placeholder="Ex: USD"
                               label="Ativo"/>
                    </div>
                </div>

            </template>
            <template #footer>
                <div class="flex justify-between">
                    <button @click="closeModal" :disabled="assetsForm.processing" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Cancelar
                    </button>

                    <Button v-if="assetsForm.processing" :disabled="assetsForm.processing"
                            class="items-center gap-2 max-w-xs">
                        <div class="flex items-center">
                            <spinner class="mr-2" color="white" size="8"/>
                            <span>Aguarde...</span>
                        </div>
                    </Button>

                    <Button v-else @click="submitAssetsForm" class="items-center gap-2 max-w-xs"
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
                        ativo?</h3>
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
    TrashIcon,
    PencilAltIcon
} from "@heroicons/vue/outline";

import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();


const assetsForm = useForm({
    asset1: '',
    asset2: ''
})

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


function submitAssetsForm() {
    assetsForm.post('/ativos', {

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


</script>

