<template>

    <Input ref="inputRef" :label="label" :placeholder="placeholder"></Input>

  </template>

  <script setup>
  import { useCurrencyInput } from 'vue-currency-input'
  import {TheCard, Modal, Input, Progress, Badge, Alert, Toast, Spinner} from 'flowbite-vue'

  const props = defineProps({
      modelValue: Number, // Vue 2: value
      options: Object,
      label: '',
      placeholder: ''
  })

  const { inputRef }  = useCurrencyInput(
      {
          locale: 'pt-BR',
          currency: 'BRL',
          currencyDisplay: 'symbol',
          precision: 2,
          hideCurrencySymbolOnFocus: false,
          hideGroupingSeparatorOnFocus: false,
          hideNegligibleDecimalDigitsOnFocus: false,
          autoDecimalDigits: false,
          useGrouping: true,
          accountingSign: false
      }
  )

  </script>
