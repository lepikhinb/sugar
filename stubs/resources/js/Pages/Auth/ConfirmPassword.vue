<script setup lang="ts">
import { Button, Input, Label, ValidationErrors } from '@/Components/Breeze'
import useRoute from '@/Hooks/useRoute'
import Layout from '@/Layouts/Guest.vue'
import { Head, useForm } from '@inertiajs/inertia-vue3'

const route = useRoute()
const form = useForm({
    password: '',
})

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    })
}
</script>

<template>
    <Head title="Confirm Password" />

    <Layout>
        <div
            class="mb-4 text-sm text-gray-600"
        >This is a secure area of the application. Please confirm your password before continuing.</div>

        <ValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <Label for="password" value="Password" />
                <Input
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                    autofocus
                />
            </div>

            <div class="flex justify-end mt-4">
                <Button
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >Confirm</Button>
            </div>
        </form>
    </Layout>
</template>