<template>
    <AuthenticatedLayout title="Dashboard">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">

            </div>
        </template>

        <div class="">
            <div class="grid md:grid-cols-3 gap-4">
                    <div class="w-full p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                        <h4 class="1xl text-1xl font-semibold leading-tight">Visão Geral</h4>

                        <div class="mt-5 flex justify-between">
                            <div>
                                <h6 class="text-sm">Renda mensal</h6>
                                <h6 class="font-bold text-emerald-500">R$ + 2500,00</h6>
                            </div>
                            <div>
                                <h6 class="text-sm">Despesa mensal</h6>
                                <h6 class="font-bold text-red-500">R$ + 2500,00</h6>
                            </div>
            
                        </div>
                    </div>
                    <div class="w-full p-6 overflow-hidden bg-emerald-500 rounded-md shadow-md dark:bg-dark-eval-1">
                 
                            <h5 class="mb-2 text-1xl font-bold tracking-tight text-white dark:text-white">Balanço do mês</h5>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-white dark:text-white">R$ 1500,00</h5>
                        
                    </div>
                    <div class="w-full p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                        <h4 class="1xl text-1xl font-semibold leading-tight">Acesso Rápido</h4>

                        <div class="mt-5 flex justify-around">
                            <div>
                                <Button iconOnly variant="danger" :size="size" title="Despesa" class="justify-center gap-2">
                                    <PlusCircleIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
                                    <span class="sr-only">Despesa</span>
                                </Button>
                            </div>
                            <div>
                                <Button iconOnly variant="success" :size="size" title="Receita" class="justify-center gap-2">
                                    <PlusCircleIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
                                    <span class="sr-only">Receita</span>
                                </Button>
                            </div>
                            <div>
                                <Button iconOnly :variant="variant" :size="size" title="Transferência" class="justify-center gap-2" v-slot="{ iconSizeClasses }">
                                    <ArrowCircleRightIcon aria-hidden="true" :class="iconSizeClasses" />
                                    <span class="sr-only">Transferência</span>
                                </Button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="grid md:grid-cols-2 gap-4 mt-10">
            <div class="d-flex item-center p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                <div>
                    <h5 class="text-sm">Despesa por categorias</h5>
                </div>
                <apexchart  type="pie" :options="CategoriesChartOptions" :series="categoryChartSeries"></apexchart>
            </div>
            <div class="w-full p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                <div>
                    <h5 class="text-sm">Balanço mensal</h5>
                </div>
                <apexchart type="bar" height="350" :options="balanceChartOptions" :series="balanceSeries"></apexchart>
            </div>
        </div>

        
        <div class="grid md:grid-cols-2 gap-4 mt-10">
            <div class="w-full p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                <div class="">
                    <h5 class="text-sm flex items-center">
                        <CalendarIcon class="text-gray-600 flex-shrink-0 w-6 h-6 mr-3" aria-hidden="true" />
                        Contas a receber
                    </h5>
                </div>

                <div class="mt-10">
                    <Alert type="success" class="mb-2">
                        No momento, não existem contas a receber.
                    </Alert>
                </div>
            </div>
            <div class="d-flex item-center p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                <div class="">
                    <h5 class="text-sm flex items-center">
                        <CalendarIcon class="text-gray-600 flex-shrink-0 w-6 h-6 mr-3" aria-hidden="true" />
                        Contas a pagar
                    </h5>
                </div>

                <div class="mt-10">
                    <Alert type="danger" class="mb-2">
                        No momento, não existem contas a pagar.
                    </Alert>
                </div>
            </div>
      
        </div>



    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import {TheCard, Modal, Input, Progress, Badge, Alert} from 'flowbite-vue'
import Button from '@/Components/Button.vue'
import {computed, onBeforeUnmount, onMounted, reactive, ref, watch} from 'vue'
import {useForm} from "@inertiajs/inertia-vue3";
import { MinusCircleIcon, PlusCircleIcon, ArrowCircleRightIcon, PresentationChartLineIcon, CalendarIcon      } from "@heroicons/vue/outline";

import {
    handleScroll,
    isDark,
    scrolling,
    toggleDarkMode,
    sidebarState,
} from '@/Composables'

const chartOptions = {
    chart: {
        height: 350,
        type: 'area'
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        type: 'datetime',
        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
    },
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        },
}
}
const series =  [
    {
        name: 'series1',
        data: [31, 40, 28, 51, 42, 109, 100]
    },
    {
        name: 'series2',
        data: [11, 32, 45, 32, 34, 52, 41]
    }
]

const balanceChartOptions = reactive({
    chart: {
        type: 'bar',
        background: 'transparent'
    },
    theme: {
        mode: 'light'
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
    },
    colors: ['#00e396', '#ff788f', '#008ffb']
})
const balanceSeries = [
    {
        name: 'Receitas',
        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 200]
    },
    {
        name: 'Despesas',
        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50]
    },
    {
        name: 'Saldo',
        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150]
    }
]

const CategoriesChartOptions = reactive({
    labels: ['categoria 1', 'categoria 2'],
    legend: {
        show: false
    }
});

const categoryChartSeries = [75, 25, 45, 56, 78]

</script>

