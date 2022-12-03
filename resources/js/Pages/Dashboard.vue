<template>
    <AuthenticatedLayout title="Dashboard">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Gerênciamento
                </h2>

            </div>
        </template>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                <the-card href="#">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <h5 class="mb-2 text-sm font-semibold leading-tight text-gray-900 dark:text-white uppercase">Banca inicial</h5>
                                    <h5 class="mb-2 font-bold dark:text-white">$53,000</h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-md bg-gradient-to-tl from-blue-500 to-violet-500">
                                    <font-awesome-icon class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white" icon="fa-solid fa-coins" />
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
                                    <h5 class="mb-2 text-sm font-semibold leading-tight text-gray-900 dark:text-white uppercase">Banca Atual</h5>

                                    <div class="flex gap-2">
                                        <h5 class="mb-2 font-bold dark:text-white">$53,000</h5>
                                        <span class="text-sm font-bold leading-normal text-emerald-500">+55% </span>
                                    </div>

                                    <div class="flex justify-content-between gap-3 mt-5">
                                        <Button color="green">Depositar</Button>
                                        <Button color="red">Sacar</Button>
                                    </div>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-md bg-gradient-to-tl from-cyan-500 to-teal-400">
                                    <font-awesome-icon class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white" icon="fa-solid fa-chart-line" />
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
                                    <h5 class="mb-2 text-sm font-semibold leading-tight text-gray-900 dark:text-white uppercase">Take Profit</h5>
                                    <h5 class="mb-2 font-bold dark:text-white">$53,000</h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-md bg-yellow-400">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                    <font-awesome-icon class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white" icon="fa-solid fa-user-secret"/>
                                </div>
                            </div>
                        </div>
                        <Progress class="mt-5" color="green" labelProgress="true"  labelPosition="inside" size="lg" progress="45"></Progress>
                    </div>

                </the-card>
                <the-card href="#">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <h5 class="mb-2 text-sm font-semibold leading-tight text-gray-900 dark:text-white uppercase">Stop loss</h5>
                                    <h5 class="mb-2 font-bold dark:text-white">$53,000</h5>

                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div class="inline-block w-12 h-12 text-center rounded-md bg-black">
                                    <font-awesome-icon class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white" icon="fa-solid fa-ban" />
                                </div>
                            </div>
                        </div>

                        <Progress class="mt-5" color="dark" labelProgress="true"  labelPosition="inside" size="lg" progress="45"></Progress>
                    </div>

                </the-card>
            </div>

        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { TheCard } from 'flowbite-vue'
import { Progress } from 'flowbite-vue'
import { ButtonGroup, Button } from 'flowbite-vue'

</script>
