<template>
    <AuthenticatedLayout title="Dashboard">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Gerênciamento {{ management.date }}
                </h2>

                <div>
                    <Button @click="showModal" variant="primary" class="items-center gap-2 max-w-xs"
                        v-slot="{ iconSizeClasses }">
                        <font-awesome-icon :class="iconSizeClasses" icon="fa-solid fa-bolt" />
                        <span>Lançar operação</span>
                    </Button>
                </div>
            </div>
        </template>

        <div>
            <div class="grid gid-cols-2 md:grid-cols-2 gap-3">
                <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                    <v-date-picker :is-dark="calendarDarkTheme" is-expanded v-model="management.date" mode="date"
                        :timezone="management.timezone" :attributes='calendarAttributes' data="YYYY/MM/DD" />

                    <div class="mt-5 flex justify-center">
                        <span
                            class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">WIN</span>
                        <span
                            class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">EMPATE</span>
                        <span
                            class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">LOSS</span>
                        <span
                            class="bg-gray-100 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">SEM
                            OPERAR</span>
                    </div>
                </div>

                <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                    <div class="mb-5">
                        <h6 class="capitalize dark:text-white">Assertividade Geral</h6>
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
        </div>

        <div class="mt-10 p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                <the-card href="#">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <h5
                                        class="mb-2 text-md font-semibold leading-tight text-gray-900 dark:text-white uppercase">
                                        Banca inicial</h5>
                                    <h5 class="mb-2 font-bold dark:text-white">$53,00</h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-14 h-14 text-center rounded-md bg-gradient-to-tl from-blue-500 to-violet-500">
                                    <font-awesome-icon
                                        class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                        icon="fa-solid fa-coins" />
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
                                    <h5
                                        class="mb-2 text-md font-semibold leading-tight text-gray-900 dark:text-white uppercase">
                                        Banca Atual</h5>

                                    <div class="flex gap-2">
                                        <h5 class="mb-2 font-bold dark:text-white">R$ 53,00</h5>
                                        <span v-show="true"
                                            class="text-sm font-bold leading-normal text-emerald-500">+55% </span>
                                        <span v-show="false" class="text-sm font-bold leading-normal text-red-500">-55%
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div v-show="true" class="inline-block w-14 h-14 text-center rounded-md bg-green-400">
                                    <font-awesome-icon
                                        class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                        icon="fa-solid fa-arrow-trend-up" />
                                </div>
                                <div v-show="false" class="inline-block w-14 h-14 text-center rounded-md bg-red-400">
                                    <font-awesome-icon
                                        class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                        icon="fa-solid fa-arrow-trend-down" />
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
                                    <h5
                                        class="mb-2 text-md font-semibold leading-tight text-gray-900 dark:text-white uppercase">
                                        Take Profit</h5>
                                    <h5 class="mb-2 font-bold dark:text-white">R$ 53,00</h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-14 h-14 text-center rounded-md bg-gradient-to-tl from-cyan-500 to-teal-400">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                    <font-awesome-icon
                                        class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                        icon="fa-solid fa-bullseye" />
                                </div>
                            </div>
                        </div>

                    </div>

                </the-card>
                <the-card href="#" class="h-50">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <h5
                                        class="mb-2 text-md font-semibold leading-tight text-gray-900 dark:text-white uppercase">
                                        Stop loss</h5>
                                    <h5 class="mb-2 font-bold dark:text-white">R$ 53,00</h5>

                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-14 h-14 text-center rounded-md bg-red-500">
                                    <font-awesome-icon
                                        class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                        icon="fa-solid fa-ban" />
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
                    <h6 class="capitalize dark:text-white">Rendimento anual </h6>
                    <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                        <font-awesome-icon class="text-emerald-500 mr-3" icon="fa-solid fa-up-long" />
                        <span class="font-semibold">4% more</span> in 2021
                    </p>
                </div>
                <div class="mt-5 w-full flex items-center justify-center">
                    <apexchart id="barChart" type="bar" width="450px" :options="barOptionsYear" :series="barSeriesYear">
                    </apexchart>
                </div>
            </div>
            <div class="w-full p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                <div class="mb-5">
                    <h6 class="capitalize dark:text-white">Desempenho mensal </h6>
                    <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                        <font-awesome-icon class="text-emerald-500 mr-3" icon="fa-solid fa-up-long" />
                        <span class="font-semibold">4% more</span> in 2021
                    </p>
                </div>
                <div class="mt-5 w-full flex items-center justify-center">
                    <apexchart id="barChart" type="bar" width="450px" :options="barOptions" :series="barSeries">
                    </apexchart>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto relative mt-10">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Data
                        </th>
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
                            Empate
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Renda
                        </th>
                        <th scope="col" class="py-3 px-6">
                            %
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Saldo
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <span
                                class="text-sm font-bold leading-normal text-black dark:text-gray-400">04/12/2022</span>
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <span class="text-sm font-bold leading-normal text-black dark:text-gray-400"> 4</span>
                        </th>
                        <td class="py-4 px-6">
                            <span class="text-sm font-bold leading-normal text-purple-500"> R$ 100,00</span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="text-sm font-bold leading-normal text-emerald-500">2 </span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="text-sm font-bold leading-normal text-red-500">1 </span>
                        </td>
                        <td class="py-4 px-6">
                            <span class="text-sm font-bold leading-normal text-yellow-500">1 </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex gap-2">
                                <span v-show="true" class="text-sm font-bold leading-normal text-emerald-500">+ R$ 30,00
                                </span>
                                <span v-show="false" class="text-sm font-bold leading-normal text-red-500">- R$ 10,00
                                </span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                                <font-awesome-icon class="text-emerald-500 mr-3" icon="fa-solid fa-up-long" />
                                <span class="font-semibold">4% </span>
                            </p>
                        </td>
                        <td class="py-4 px-6">
                            <span class="text-sm font-bold leading-normal text-cyan-500">+ R$ 100,00 </span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <Modal size="6xl" v-if="isShowModal" @close="closeModal">

            <template #body>
                <div class="grid md:grid-cols-4 gap-3">
                    <the-card href="#" class="w-full">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <h5
                                            class="mb-2 text-1xl font-semibold leading-tight text-gray-900 dark:text-white uppercase">
                                            Take</h5>
                                        <h5 class="mb-2 font-bold dark:text-white">R$ 23,00</h5>

                                    </div>
                                </div>

                                <div class="px-3 text-right basis-1/3">
                                    <div class="inline-block w-12 h-12 text-center rounded-md bg-emerald-500">
                                        <i
                                            class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                        <font-awesome-icon
                                            class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                            icon="fa-solid fa-bullseye" />
                                    </div>
                                </div>

                            </div>

                            <div class="mt-6 w-full">
                                <Progress :labelProgress="true" labelPosition="outside" size="xl" color="green" label=""
                                    :progress="(takeProgress > 100) ? 100 : takeProgress"></Progress>
                            </div>

                        </div>
                    </the-card>

                    <the-card href="#" class="w-full">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <h5
                                            class="mb-2 text-1xl font-semibold leading-tight text-gray-900 dark:text-white uppercase">
                                            Stop</h5>
                                        <h5 class="mb-2 font-bold dark:text-white"> R$ 15,00</h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div class="inline-block w-12 h-12 text-center rounded-md bg-red-500">
                                        <font-awesome-icon
                                            class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                            icon="fa-solid fa-ban" />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 w-full">
                                <Progress :labelProgress="true" labelPosition="outside" size="xl" color="red" label=""
                                    :progress="stopProgress"></Progress>
                            </div>
                        </div>
                    </the-card>

                    <the-card href="#" class="w-full">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <h5
                                            class="mb-2 text-1xl font-semibold leading-tight text-gray-900 dark:text-white uppercase">
                                            Banca</h5>
                                        <h5 class="mb-2 font-bold dark:text-white">R$ 23,00</h5>

                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div class="inline-block w-12 h-12 text-center rounded-md bg-cyan-500">
                                        <i
                                            class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                        <font-awesome-icon
                                            class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"
                                            icon="fa-solid fa-bullseye" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <Progress :labelProgress="true" labelPosition="outside" size="xl" :color="plusOne"
                                :label="plusOneString"
                                :progress="(ManagementPieSeries > 100) ? 100 : ManagementPieSeries"></Progress>
                        </div>
                    </the-card>

                    <the-card href="#" class="w-full">
                        <div class=" p-4 justify-center text-center">
                            <h5
                                class="mb-2 text-1xl font-semibold leading-tight text-gray-900 dark:text-white uppercase">
                                Placar</h5>
                        </div>
                        <div class="flex justify-center justify-content-around">
                            <span class="text-2xl font-bold leading-normal text-emerald-500 mr-2">{{ win }} -</span>

                            <span class="text-2xl font-bold leading-normal text-red-500 mr-2">{{
                                    loss
                            }} -</span>

                            <span class="text-2xl font-bold leading-normal text-yellow-500 mr-2">{{
                                    draw
                            }} </span>
                        </div>
                    </the-card>
                </div>
                <div class="mt-5">
                    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                        <div class="grid md:grid-cols-6 md:gap-6">
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
                                <Input @keyup="calcIncome" v-model="tradeForm.payout" placeholder="87%"
                                    label="Payout" />
                            </div>
                            <div class="mb-6">
                                <Input @keyup="calcIncome" v-model="tradeForm.value" placeholder="R$ 50,00"
                                    label="Entrada" />
                            </div>
                            <div class="mb-6">
                                <Input class=" font-bold text-emerald-500" v-model="tradeForm.income" disabled
                                    placeholder="" label="Lucro" />
                            </div>
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
                    </div>
                </div>
                <div class="grid md:grid-cols-2">
                    <div class="mt-5 p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-2">
                        <textarea v-model="tradeForm.observation" id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Observações"></textarea>
                    </div>
                    <div class="mt-5 flex items-center justify-center gap-4 ">
                        <Button @click="scoreWin" variant="success" size="lg" class="uppercase">
                            Win
                        </Button>
                        <Button @click="scoreDraw" variant="warning" size="lg" class="uppercase">
                            Empate
                        </Button>
                        <Button @click="scoreLoss" variant="danger" size="lg" class="uppercase">
                            Loss
                        </Button>
                    </div>
                </div>
            </template>
        </Modal>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { TheCard, Modal, Input, Progress, Badge } from 'flowbite-vue'
import Button from '@/Components/Button.vue'
import { computed, reactive, ref, watch } from 'vue'
import { useForm } from "@inertiajs/inertia-vue3";
import { isDark } from '@/Composables'
import { ChartBarIcon } from "@heroicons/vue/outline";

const tradeForm = useForm({
    asset: 'EUR/USD',
    payout: '82',
    value: '',
    income: '0',
    orderType: 'CALL',
    operational: 'Retração M5',
    observation: 'Digite sua observação'
})

const management = useForm({
    date: '2022/12/05',
    timezone: 'America/Buenos_Aires'
})

//START V-CALENDAR
let calendarDarkTheme = ref(isDark);

const calendarDate = new Date();
const calendarAttributes = [
    {
        key: 'loss',
        highlight: 'red',
        dates: new Date(calendarDate.getFullYear(), calendarDate.getMonth(), 12),
    },
    {
        key: 'win',
        highlight: 'green',
        dates: new Date(calendarDate.getFullYear(), calendarDate.getMonth(), 1),
    },
    {
        key: 'win',
        highlight: 'green',
        dates: new Date(calendarDate.getFullYear(), calendarDate.getMonth(), 2),
    },
    {
        key: 'win',
        highlight: 'green',
        dates: new Date(calendarDate.getFullYear(), calendarDate.getMonth(), 5),
    },
    {
        key: 'otc',
        highlight: 'gray',
        dates: new Date(calendarDate.getFullYear(), calendarDate.getMonth(), 3),
    },
    {
        key: 'otc',
        highlight: 'gray',
        dates: new Date(calendarDate.getFullYear(), calendarDate.getMonth(), 4),
    },
    {
        key: 'win',
        highlight: 'green',
        dates: new Date(calendarDate.getFullYear(), calendarDate.getMonth(), 5),
    },
    {
        key: 'win',
        highlight: 'green',
        dates: new Date(calendarDate.getFullYear(), calendarDate.getMonth(), 6),
    },
    {
        key: 'otc',
        highlight: 'gray',
        dates: new Date(calendarDate.getFullYear(), calendarDate.getMonth(), 7),
    },
    {
        key: 'win',
        highlight: 'green',
        dates: new Date(calendarDate.getFullYear(), calendarDate.getMonth(), 8),
    },
    {
        key: 'win',
        highlight: 'green',
        dates: new Date(calendarDate.getFullYear(), calendarDate.getMonth(), 9),
    },
    {
        key: 'otc',
        highlight: 'gray',
        dates: new Date(calendarDate.getFullYear(), calendarDate.getMonth(), 10),
    },
    {
        key: 'otc',
        highlight: 'gray',
        dates: new Date(calendarDate.getFullYear(), calendarDate.getMonth(), 11),
    },
    {
        key: 'win',
        highlight: 'green',
        dates: new Date(calendarDate.getFullYear(), calendarDate.getMonth(), 12),
    },
]
//END V-CALENDAR

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

//GERENCIAMENTO RISCO BANCA
let ManagementPieSeries = ref(0)
let ManagementPieSeriesMessage = ref('Aceitável')
//GERENCIAMENTO RISCO BANCA

const calcIncome = () => {
    const incomeResult = (tradeForm.payout / 100) * tradeForm.value
    tradeForm.income = formatter.format(incomeResult);

    ManagementPieSeries.value = ((tradeForm.value === '') ? 0 : parseInt(tradeForm.value) * 100) / 25
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
let options = reactive({
    labels: ['Vitorias', 'Derrotas'],
    colors: ['#00e396', '#ff788f']
});
const series = [75, 25]
//PIE CHART

//START BAR CHART YEAR
const barSeriesYear = [
    {
        name: 'Renda Mensal',
        data: [594.26, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    }
]
let barOptionsYear = reactive({
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
        categories: ['2022', '2023', '2024', '2025', '2026', '2027', '2028', '2029', '2030', '2031'],
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
})
//END BAR CHART YEAR

//START BAR CHART MONTH
const barSeries = [
    {
        name: 'Prejuizo',
        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 40]
    },
    {
        name: 'Lucro',
        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 94]
    }
]
let barOptions = reactive({
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
    }
})
//END BAR CHART MONTH

watch(isDark, (isDark) => {

    if (isDark) {
        options = {
            theme: {
                mode: 'dark'
            }
        }
        barOptionsYear = {
            theme: {
                mode: 'dark'
            }
        }

        barOptions = {
            theme: {
                mode: 'dark'
            }
        }

    } else {

        options = {
            theme: {
                mode: 'light'
            }
        }

        barOptionsYear = {
            theme: {
                mode: 'light'
            }
        }

        barOptions = {
            theme: {
                mode: 'light'
            }
        }
    }
})


const plusOne = computed(() => {
    if (ManagementPieSeries.value <= 5) {
        plusOneString = 'Acetável'
        return 'green'
    } else if (ManagementPieSeries.value <= 15) {
        plusOneString = 'Moderado'
        return 'yellow'
    } else if (ManagementPieSeries.value > 15) {
        plusOneString = 'Alto risco'
        return 'red'
    }

})


let plusOneString = computed({
    get: () => ManagementPieSeriesMessage.value,
    set: (val) => {
        ManagementPieSeriesMessage.value = val
    }
})


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
