<script setup lang="ts">
import { ref } from "@vue/reactivity"

const emit = defineEmits(['update:modelValue'])
const props = defineProps(['modelValue'])

const input = ref<HTMLInputElement>()
const updateValue = (event: InputEvent) => {
    emit('update:modelValue', (event.target as HTMLInputElement).value)
}

const focus = () => input.value?.focus()
</script>

<template>
    <input
        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        :value="modelValue"
        @input="updateValue"
        ref="input"
    />
</template>