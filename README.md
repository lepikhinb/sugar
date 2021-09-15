# Sugar

Sugar provides a supercharged starting point for Laravel applications. The package is built on top of the official [Laravel Breeze](https://github.com/laravel/breeze), and includes:

-   Vite (instead of Webpack + Mix)
-   Vue 3 (modern SFC setup script syntax)
-   TypeScript
-   Tailwind CSS
-   Inertia.js

## Installation

You can install the package via composer:

```bash
composer require based/sugar --dev
```

Then, publish the assets provided by Sugar, and compile them:

```bash
php artisan sugar:install

npm install
npm run dev
```

> Be careful installing Sugar on existing projects, as it completely removes `app.js`

## Inertia.js

The package comes with Inertia.js and includes components from Laravel Breeze, optimized for a better experience with Vue 3 and TypeScript.

```vue
<script setup lang="ts">
import { Button, Checkbox, Input, Label, ValidationErrors } from '@/Components/Breeze'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import useRoute from '@/Hooks/useRoute'

const route = useRoute()
const props = defineProps({
    canResetPassword: Boolean,
    status: String,
})

const form = useForm({
    email: '',
    password: '',
    remember: false
})

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    })
}
</script>
```

## Vite

[Vite](https://vitejs.dev/) is a build tool that aims to provide a faster and leaner development experience for modern web projects. Read [Why Vite?](https://vitejs.dev/guide/why.html) for more details.

The support is provided by [Laravel Vite](https://laravel-vite.innocenzi.dev/) package.

## TypeScript

TypeScript provides optional static typing, which lets you structure and validate your code at the compilation stage. It also brings the IDE autocompletion and validation support along with the code navigation feature.

Reimagined Breeze components utilize TypeScript. However, you're free to use the familiar syntax.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
