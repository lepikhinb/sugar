<script setup lang="ts">
import { Button, Input, Label, ValidationErrors } from '@/Components/Breeze'
import useRoute from '@/Hooks/useRoute'
import Layout from '@/Layouts/Guest.vue'
import { Head, useForm } from '@inertiajs/inertia-vue3'

const route = useRoute()
const props = defineProps({
    status: String,
})

const form = useForm({
    email: ''
})

const submit = () => {
    form.post(route('password.email'))
}
</script>


<template>
    <Head title="Forgot Password" />

    <Layout>
        <div
            class="mb-4 text-sm text-gray-600"
        >Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">{{ status }}</div>

        <ValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <Label for="email" value="Email" />
                <Input
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Button
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >Email Password Reset Link</Button>
            </div>
        </form>
    </Layout>
</template>