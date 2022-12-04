<template>
    <AuthenticatedLayout title="Dashboard">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Gerênciamento
                </h2>

                <div>
                    <Button @click="showModal" variant="primary"  class="items-center gap-2 max-w-xs" v-slot="{ iconSizeClasses }">
                        <font-awesome-icon :class="iconSizeClasses" icon="fa-solid fa-bolt" />
                        <span>Lançar operação</span>
                    </Button>
                </div>


            </div>
        </template>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                <the-card href="#">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <h5 class="mb-2 text-sm font-semibold leading-tight text-gray-900 dark:text-white uppercase">
                                        Banca inicial</h5>
                                    <h5 class="mb-2 font-bold dark:text-white">$53,000</h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-md bg-gradient-to-tl from-blue-500 to-violet-500">
                                    <font-awesome-icon
                                        class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                        icon="fa-solid fa-coins"/>
                                </div>
                            </div>
                        </div>
                    </div>

                </the-card>
                <the-card href="#">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <h5 class="mb-2 text-sm font-semibold leading-tight text-gray-900 dark:text-white uppercase">
                                        Banca Atual</h5>

                                    <div class="flex gap-2">
                                        <h5 class="mb-2 font-bold dark:text-white">$53,000</h5>
                                        <span v-show="true" class="text-sm font-bold leading-normal text-emerald-500">+55% </span>
                                        <span v-show="false"
                                              class="text-sm font-bold leading-normal text-red-500">-55% </span>
                                    </div>

                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div v-show="true" class="inline-block w-12 h-12 text-center rounded-md bg-green-400">
                                    <font-awesome-icon
                                        class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                        icon="fa-solid fa-arrow-trend-up"/>
                                </div>
                                <div v-show="false" class="inline-block w-12 h-12 text-center rounded-md bg-red-400">
                                    <font-awesome-icon
                                        class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                        icon="fa-solid fa-arrow-trend-down"/>
                                </div>
                            </div>
                        </div>
                    </div>

                </the-card>

                <the-card href="#">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <h5 class="mb-2 text-sm font-semibold leading-tight text-gray-900 dark:text-white uppercase">
                                        Take Profit</h5>
                                    <h5 class="mb-2 font-bold dark:text-white">$53,000</h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-md bg-gradient-to-tl from-cyan-500 to-teal-400">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                    <font-awesome-icon class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white" icon="fa-solid fa-bullseye" />
                                </div>
                            </div>
                        </div>

                    </div>

                </the-card>
                <the-card href="#">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <h5 class="mb-2 text-sm font-semibold leading-tight text-gray-900 dark:text-white uppercase">
                                        Stop loss</h5>
                                    <h5 class="mb-2 font-bold dark:text-white">$53,000</h5>

                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-md bg-black">
                                    <font-awesome-icon
                                        class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                        icon="fa-solid fa-ban"/>
                                </div>
                            </div>
                        </div>


                    </div>

                </the-card>
            </div>
        </div>

        <div class=" mt-10 grid grid-cols-1 md:grid-cols-2 gap-3">
            <div class="w-full p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                <div class="mb-5">
                    <h6 class="capitalize dark:text-white">Desempenho mensal </h6>
                    <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                        <font-awesome-icon class="text-emerald-500 mr-3" icon="fa-solid fa-up-long"/>
                        <span class="font-semibold">4% more</span> in 2021
                    </p>
                </div>
                <div class="mt-5 w-full flex items-center justify-center">
                    <apexchart id="barChart" type="bar" width="450px" :options="barOptions"
                               :series="barSeries"></apexchart>
                </div>
            </div>
            <div class="w-full p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                <div class="mb-5">
                    <h6 class="capitalize dark:text-white">Assertividade</h6>
                    <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                        <i class="fa fa-arrow-up text-emerald-500" aria-hidden="true"></i>
                        <span class="font-semibold">4% more</span> in 2021
                    </p>
                </div>
                <div class="mt-5 w-full flex items-center justify-center">
                    <apexchart width="380" type="donut" :options="options" :series="series"></apexchart>
                </div>
            </div>
        </div>




        <Modal size="5xl" v-if="isShowModal">
            <template #header>
                <div class="flex justify-between">
                    <div class="flex items-center text-lg">
                        Terms of Service
                    </div>
                </div>
            </template>
            <template #body>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                </p>
            </template>
            <template #footer>
                <div class="flex justify-between">
                    <button @click="closeModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Decline
                    </button>
                    <button @click="closeModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        I accept
                    </button>
                </div>
            </template>
        </Modal>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import {TheCard, Modal} from 'flowbite-vue'
import Button from '@/Components/Button.vue'
import { GithubIcon } from '@/Components/Icons/brands'
import { ref } from 'vue'

const isShowModal = ref(false)
function closeModal() {
    isShowModal.value = false
}
function showModal() {
    isShowModal.value = true
}


const options = {
    labels: ['Vitorias', 'Derrotas'],
    colors: ['#00e396', '#ff788f']
};
const series = [25, 25]

const barSeries = [
    {
        name: 'Prejuizo',
        data: [12, 44, 55, 57, 56, 61, 58, 63, 60, 66, 78, 0]
    },
    {
        name: 'Lucro',
        data: [12, 76, 85, 101, 98, 87, 105, 91, 114, 94, 80, 94]
    }
]

let barOptions = {

    chart: {
        type: 'bar',
        background: 'transparent'
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '70%',
            endingShape: 'rounded'
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dez'],
    },
    yaxis: {
        title: {
            text: 'R$ (Reais)'
        }
    },
    fill: {
        opacity: 1
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return "R$ " + val + " Reais"
            }
        }
    }
}


</script>

<style scoped>
#barChart svg {
    background-color: transparent !important;
}
</style>
