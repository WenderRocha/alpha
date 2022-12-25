<template>
    <AuthenticatedLayout title="Dashboard">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Crie e gerencie suas carteiras
                </h2>

                <Button @click="showModal" class="items-center gap-2 max-w-xs" v-slot="{ iconSizeClasses }">
                    <PlusCircleIcon aria-hidden="true" :class="iconSizeClasses"/>
                    <span>Nova carteira</span>
                </Button>
            </div>
        </template>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="grid md:grid-cols-3 gap-4">
                <the-card>

                    <img class="logo-wallet" src="/img/wallet.png" alt="">

                    <h4 class="my-4 text-center text-1xl font-semibold tracking-tight text-gray-900 dark:text-white">
                        Quotex
                    </h4>
                    <div class="mt-5 flex justify-around">
                        <div>
                            <Button class="items-center gap-2 max-w-xs">
                                <span>Gerênciar</span>
                            </Button>
                        </div>
                    </div>
                </the-card>


            </div>
        </div>

        <Modal v-if="isShowModal" @close="closeModal">
            <template #header>
                <div class="flex items-center text-lg">
                    {{ walletForm.name || walletOptionsForm.name }}
                </div>
            </template>
            <template #body>


                <div v-if="!binaryOptions">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                            <Input v-model="walletForm.name" placeholder="Nubank, IQ Option..." label="Nome"/>
                        </div>
                        <div class="mb-6">
                            <CurrencyInput v-model="walletForm.initialDeposit" label="Depósito inicial" placeholder="R$ 150,00"/>
                        </div>
                    </div>
                </div>


                <div class="mb-6">
                    <label @click="formsReset" for="binaryOptions"
                           class="inline-flex relative items-center cursor-pointer">
                        <input type="checkbox" v-model="binaryOptions" id="binaryOptions" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Carteira de opções binárias ?</span>
                    </label>
                </div>

                <div v-if="binaryOptions">

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                            <Input v-model="walletOptionsForm.name" placeholder="Nubank, IQ Option..." label="Nome"/>
                        </div>
                        <div class="mb-6">
                            <CurrencyInput v-model="walletOptionsForm.initialDeposit" label="Depósito inicial" placeholder="R$ 150,00"/>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                            <label for="managementType"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tipo de
                                Gerênciamento</label>
                            <select v-model="walletOptionsForm.managementType" id="managementType"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="fixed">Fixo</option>
                                <option value="compound">Juros Compostos</option>
                            </select>
                        </div>


                        <div class="mb-6 flex items-center justify-center">
                            <label for="default-toggle" class="inline-flex relative items-center cursor-pointer">
                                <input v-model="walletOptionsForm.mainWallet" type="checkbox" value=""
                                       id="default-toggle" class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Carteira principal</span>
                            </label>
                        </div>
                    </div>

                    <div v-if="walletOptionsForm.managementType === 'compound'" class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                            <Input v-model="walletOptionsForm.takeProfit" placeholder="Digite apenas números" label="Take Ex: 10%"/>
                        </div>
                        <div class="mb-6">
                            <Input v-model="walletOptionsForm.stopLoss" placeholder="Digite apenas números" label="Stop Ex: 5%"/>
                        </div>
                    </div>

                    <div v-else class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                            <CurrencyInput v-model="walletOptionsForm.takeProfit" label="Take" placeholder="R$ 10,00"/>
                        </div>
                        <div class="mb-6">
                            <CurrencyInput v-model="walletOptionsForm.stopLoss" label="Stop" placeholder="R$ 5,00"/>
                        </div>
                    </div>


                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                            <CurrencyInput v-model="walletOptionsForm.minWithdraw" label="Valor minimo para saque" placeholder="R$ 50,00"/>
                        </div>
                        <div class="mb-6">
                            <label for="currency"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Moeda</label>
                            <select v-model="walletOptionsForm.currency" id="currency"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="BRL">BRL</option>
                                <option value="USD">USD</option>
                            </select>
                        </div>
                    </div>
                </div>

            </template>
            <template #footer>
                <div class="flex justify-between">
                    <button @click="closeModal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Cancelar
                    </button>

                    <div v-if="binaryOptions">
                        <Button v-if="walletForm.processing" :disabled="walletForm.processing"
                                class="items-center gap-2 max-w-xs" v-slot="{ iconSizeClasses }">
                            <div class="flex items-center">
                                <spinner class="mr-2" color="white" size="8"/>
                                <span>Aguarde...</span>
                            </div>
                        </Button>


                        <Button v-else @click="submitWalletOptionsForm" class="items-center gap-2 max-w-xs"
                                v-slot="{ iconSizeClasses }">
                            <CheckIcon aria-hidden="true" :class="iconSizeClasses"/>
                            <span>abrir carteira</span>
                        </Button>
                    </div>

                    <div v-else>
                        <Button v-if="walletForm.processing" :disabled="walletForm.processing"
                                class="items-center gap-2 max-w-xs" v-slot="{ iconSizeClasses }">
                            <div class="flex items-center">
                                <spinner class="mr-2" color="white" size="8"/>
                                <span>Aguarde...</span>
                            </div>
                        </Button>


                        <Button v-else @click="submitWalletForm" class="items-center gap-2 max-w-xs"
                                v-slot="{ iconSizeClasses }">
                            <CheckIcon aria-hidden="true" :class="iconSizeClasses"/>
                            <span>abrir carteira</span>
                        </Button>
                    </div>

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
import  CurrencyInput  from "@/Shared/CurrencyInput.vue";

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


import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const binaryOptions = ref(false);

const $toast = useToast();

const walletForm = useForm({
    type: 'wallet',
    name: '',
    initialDeposit: 13.00
})

const walletOptionsForm = useForm({
    type: 'binaryWallet',
    name: '',
    logo: 'https://img.icons8.com/color/48/000000/wallet--v1.png',
    initialDeposit: 0,
    takeProfit: '',
    stopLoss: '',
    minWithdraw: '50',
    currency: 'BRL',
    managementType: 'fixed',
    mainWallet: false
})


const formsReset = () => {
    walletOptionsForm.reset()
    walletForm.reset()
}


function submitWalletOptionsForm() {
    walletOptionsForm.post('/carteiras', {

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

function submitWalletForm() {
    walletForm.post('/carteiras', {

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


<style>
.logo-wallet {
    width: 80px;
}
</style>
