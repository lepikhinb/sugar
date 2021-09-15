export default () => {
    return (
        name?: string,
        params?: Array<string> | object,
        absolute?: boolean
    ): any => {
        return window.route(name, params, absolute)
    }
}
