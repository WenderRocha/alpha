<template>
    <AuthenticatedLayout title="Dashboard">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Gerênciamento
                </h2>

                <div>
                    <Button @click="showModal" variant="primary" class="items-center gap-2 max-w-xs"
                            v-slot="{ iconSizeClasses }">
                        <font-awesome-icon :class="iconSizeClasses" icon="fa-solid fa-bolt"/>
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
                                    <font-awesome-icon
                                        class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                        icon="fa-solid fa-bullseye"/>
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

        <div class="overflow-x-auto relative mt-10">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Trades
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Investimento
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Win
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Loss
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Renda
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Porcentagem
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Saldo banca
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        2
                    </th>
                    <td class="py-4 px-6">
                        R$ 30,00
                    </td>
                    <td class="py-4 px-6">
                        2
                    </td>
                    <td class="py-4 px-6">
                        1
                    </td>
                    <td class="py-4 px-6">
                        R$ 30,00
                    </td>
                    <td class="py-4 px-6">
                        <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                            <font-awesome-icon class="text-emerald-500 mr-3" icon="fa-solid fa-up-long"/>
                            <span class="font-semibold">4% </span>
                        </p>
                    </td>
                    <td class="py-4 px-6">
                        R$ 100,00
                    </td>
                </tr>


                </tbody>
            </table>
        </div>

        <Modal size="7xl" v-if="isShowModal">

            <template #body>
                <div class="flex justify-end">
                    <button @click="closeModal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Cancelar
                    </button>
                </div>

                <!---start take-->
                <div v-show="false">
                    <div class="bg-emerald-500 rounded-md p-6 justify-center items-center w-full">
                        <h5 class="mb-6 text-2xl font-bold tracking-tight text-white dark:text-white text-center">
                            Parabens! é Take!
                        </h5>
                        <p class="mb-6 font-bold tracking-tight text-white dark:text-white text-center">Você atingiu sua
                            meta de hoje! respeite seu gerenciamento e volte amanhã.</p>
                        <p class="font-bold tracking-tight text-white dark:text-white text-center">
                            A ambição dever ser pelo "SER" e não pelo "TER".
                            O "TER" é consequência do "SER" disciplinado, compromissado, focado, dedicado e determinado.
                        </p>
                        <div class="flex justify-center">
                            <img class="trophy" src="/img/trophy.svg" alt="">
                        </div>
                    </div>
                </div>
                <!--end take-->
                <div v-if="true" class=" grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="w-full">
                        <!--start management-->
                        <div>
                            <h5 class="mb-6 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
                                Gerênciamento</h5>
                            <div class="flex justify-center gap-4">

                                <the-card href="#">
                                    <div class="flex-auto p-4">
                                        <div class="flex flex-row -mx-3">
                                            <div class="flex-none w-2/3 max-w-full px-3">
                                                <div>
                                                    <h5 class="mb-2 text-sm font-semibold leading-tight text-gray-900 dark:text-white uppercase">
                                                        Take Profit</h5>
                                                    <h5 class="mb-2 font-bold dark:text-white">R$ 23,00</h5>

                                                </div>
                                            </div>

                                            <div class="px-3 text-right basis-1/3">
                                                <div
                                                    class="inline-block w-12 h-12 text-center rounded-md bg-emerald-500">
                                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                                    <font-awesome-icon
                                                        class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                                        icon="fa-solid fa-bullseye"/>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mt-6 w-full">
                                            <Progress :labelProgress="true" labelPosition="inside" size="xl"
                                                      color="green"
                                                      label="" :progress="takeProgress"></Progress>
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
                                                    <h5 class="mb-2 font-bold dark:text-white"> R$ 15,00</h5>
                                                </div>
                                            </div>
                                            <div class="px-3 text-right basis-1/3">
                                                <div class="inline-block w-12 h-12 text-center rounded-md bg-red-500">
                                                    <font-awesome-icon
                                                        class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                                        icon="fa-solid fa-ban"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-6 w-full">
                                            <Progress :labelProgress="true" labelPosition="inside" size="xl" color="red"
                                                      label="" :progress="stopProgress"></Progress>
                                        </div>
                                    </div>

                                </the-card>
                            </div>
                            <div class="flex justify-center mt-6">
                                <img class="piggy" src="/img/piggy.svg" alt="">
                            </div>
                        </div>
                        <!--end management-->

                    </div>
                    <div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="mb-6">
                                <label for="countries"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ativo</label>
                                <select v-model="tradeForm.asset" id="countries"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected disabled>Selecione o ativo</option>
                                    <option value="EUR/USD">EUR/USD</option>
                                    <option value="GBP/USD">GBP/USD</option>
                                    <option value="EUR/USD">EUR/USD</option>
                                    <option value="CAD/CHF">CAD/CHF</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <Input @keyup="calcIncome" v-model="tradeForm.payout" placeholder="87%" label="Payout"/>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="mb-6">
                                <Input @keyup="calcIncome" v-model="tradeForm.value" placeholder="R$ 50,00"
                                       label="Entrada"/>
                            </div>
                            <div class="mb-6">
                                <Input class="text-emerald-500" v-model="tradeForm.income" disabled placeholder=""
                                       label="Lucro"/>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="mb-6">
                                <label for="countries"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operacional</label>
                                <select v-model="tradeForm.operational" id="countries"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected disabled>Selecione o operacional</option>
                                    <option value="Retração M5">Retração M5</option>
                                    <option value="Suporte e Resistencia">Suporte e Resistência</option>
                                    <option value="Retração">Retração</option>
                                    <option value="Vela vela">Vela vela</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="countries"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de
                                    ordem</label>
                                <select v-model="tradeForm.orderType" id="countries"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="CALL">COMPRA</option>
                                    <option value="PUT">VENDA</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-6">
                            <textarea v-model="tradeForm.observation" id="message" rows="4"
                                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                      placeholder="Observações"></textarea>
                        </div>

                        <div class="flex gap-3 justify-center">
                            <Button @click="scoreWin" variant="success" class="items-center gap-2 max-w-xs">
                                Win
                            </Button>

                            <Button @click="scoreDraw" variant="warning" class="items-center gap-2 max-w-xs">
                                Empate
                            </Button>

                            <Button @click="scoreLoss" variant="danger" class="items-center gap-2 max-w-xs">
                                Loss
                            </Button>
                        </div>
                    </div>
                </div>
            </template>
        </Modal>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import {TheCard, Modal, Input, Progress, Badge} from 'flowbite-vue'
import Button from '@/Components/Button.vue'
import {ref} from 'vue'
import {useForm} from "@inertiajs/inertia-vue3";

const tradeForm = useForm({
    asset: 'EUR/USD',
    payout: '82',
    value: '',
    income: '0',
    orderType: 'CALL',
    operational: 'Retração M5',
    observation: 'Digite sua observação'
})

//START MANAGEMENT
const takeProgress = 45;
const stopProgress = 100;
//END MANAGEMENT


//START SCORE
const win = ref(0);
const draw = ref(0);
const loss = ref(0);

const formatter = new Intl.NumberFormat("pt-BR", {
    style: "currency",
    currency: "BRL",
    minimumFractionDigits: 2,
});

const calcIncome = () => {
    const incomeResult = (tradeForm.payout / 100) * tradeForm.value
    tradeForm.income = formatter.format(incomeResult);
}

const scoreWin = () => {
    win.value += 1;
}
const scoreDraw = () => {
    draw.value += 1;
}
const scoreLoss = () => {
    loss.value += 1;
}
//END SCORE

//START MODAL
const isShowModal = ref(false)

function closeModal() {
    isShowModal.value = false
}

function showModal() {
    isShowModal.value = true
}

//END MODAL

//PIE CHART
const options = {
    labels: ['Vitorias', 'Derrotas'],
    colors: ['#00e396', '#ff788f']
};
const series = [25, 25]
//PIE CHART

//START BAR CHART
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
const barOptions = {

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
//END BAR CHART


</script>

<style scoped>
#barChart svg {
    background-color: transparent !important;
}

.piggy {
    max-width: 200px;
}

.trophy {
    max-width: 200px;
}
</style>
