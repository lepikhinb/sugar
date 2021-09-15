<script setup lang="ts">
import { computed } from "@vue/reactivity"

const emit = defineEmits(['update:checked'])
const props = defineProps({
    checked: {
        type: [Array, Boolean],
        default: false,
    },
    value: {
        default: null,
    },
})

const proxyChecked = computed<boolean | Array<any>>({
    get() {
        return props.checked
    },

    set(value) {
        emit("update:checked", value)
    },
})
</script>

<template>
    <input
        type="checkbox"
        :value="value"
        v-model="proxyChecked"
        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
    />
</template>