<template>
    <PerfectScrollbar
        tagname="nav"
        aria-label="main"
        class="relative flex flex-col flex-1 max-h-full gap-4 px-3"
    >

        <SidebarLink
            title="Dashboard"
            :href="route('dashboard')"
            :active="route().current('dashboard')"
        >
            <template #icon>
                <DashboardIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </template>
        </SidebarLink>

        <SidebarCollapsible title="Controle" :active="route('').current('app.*')">
            <template #icon>
                <CalculatorIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </template>


            <SidebarCollapsibleItem
                :href="route('app.wallet')"
                title="Carteiras"
                :active="route().current('app.wallet')"
            />

            <SidebarCollapsibleItem
                :href="route('app.toReceive')"
                title="Receber"
                :active="route().current('app.toReceive')"
            />

            <SidebarCollapsibleItem
                :href="route('app.toPay')"
                title="Pagar"
                :active="route().current('app.toPay')"
            />

            <SidebarCollapsibleItem
                :href="route('app.fixed')"
                title="Fixas"
                :active="route().current('app.fixed')"
            />
        </SidebarCollapsible>
        <SidebarCollapsible title="Gerênciamento" :active="route('').current('gerenciamento.*')">
            <template #icon>
                <ChartSquareBarIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </template>

            <SidebarCollapsibleItem
                :href="route('gerenciamento.index')"
                title="Resumo"
                :active="route().current('gerenciamento.index')"
            />

            <SidebarCollapsibleItem
                :href="route('gerenciamento.operationals')"
                title="Operacional"
                :active="route().current('gerenciamento.operationals')"
            />

            
            <SidebarCollapsibleItem
                :href="route('gerenciamento.assets')"
                title="Ativos"
                :active="route().current('gerenciamento.assets')"
            />


        </SidebarCollapsible>

        <SidebarLink class="text-emerald-500"
            title="Assinatura"
            :href="route('app.toPay')"
            :active="route().current('app.toPay')"
        >
            <template #icon>
                <LightningBoltIcon  class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </template>
        </SidebarLink>

        <SidebarLink
            title="Suporte"
            :href="route('app.toPay')"
            :active="route().current('app.toPay')"
        >
            <template #icon>
                <SupportIcon class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            </template>
        </SidebarLink>



        <!-- Examples -->
        <!--
        => External link example
        <SidebarLink
            title="Github"
            href="https://github.com/kamona-wd/kui-laravel-breeze"
            external
            target="_blank"
        >
        </SidebarLink>

        => Collapsible examples
        <SidebarCollapsible title="Users" :active="$page.url.startsWith('/users')">
            <SidebarCollapsibleItem :href="route('users.index')" title="List" :active="$page.url === '/users/index'" />
            <SidebarCollapsibleItem :href="route('users.create')" title="Create" :active="$page.url === '/users/create'" />
        </SidebarCollapsible>

        <SidebarCollapsible title="Users" :active="usePage().url.value.startsWith('/users')">
            <template #icon>
                <UserIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>

            <SidebarCollapsibleItem :href="route('users.index')" title="List" :active="route().current('users.index')" />
            <SidebarCollapsibleItem :href="route('users.create')" title="Create" :active="route().current('users.create')" />
        </SidebarCollapsible>-->
    </PerfectScrollbar>
</template>

<script setup>
import PerfectScrollbar from '@/Components/PerfectScrollbar.vue'
import SidebarLink from '@/Components/Sidebar/SidebarLink.vue'
import { DashboardIcon } from '@/Components/Icons/outline'
import SidebarCollapsible from '@/Components/Sidebar/SidebarCollapsible.vue'
import SidebarCollapsibleItem from '@/Components/Sidebar/SidebarCollapsibleItem.vue'
import { TemplateIcon, SupportIcon, CalculatorIcon, LightningBoltIcon, ChartSquareBarIcon   } from "@heroicons/vue/outline";
</script>
