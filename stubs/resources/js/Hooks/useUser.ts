import { usePage } from "@inertiajs/inertia-vue3"
import { computed } from "@vue/reactivity"

export default () => {
    return computed<App.Models.User>(() => usePage<any>().props.value.auth.user)
}
