import { Router } from "ziggy-js"

export default () => {
    return (
        name?: string,
        params?: Array<string> | object,
        absolute?: boolean
    ): Router & string => {
        return window.route(name, params, absolute)
    }
}

