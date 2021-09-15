<script setup lang="ts">
import { usePage } from "@inertiajs/inertia-vue3"
import { computed } from "@vue/reactivity"

const errors = computed<Map<string, string>>(() => usePage<any>().props.value.errors)
const hasErrors = computed(() => Object.keys(errors.value).length > 0)
</script>

<template>
    <div v-if="hasErrors">
        <div class="font-medium text-red-600">Whoops! Something went wrong.</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </div>
</template>