import { defineConfig } from "laravel-vite"
import vue from "@vitejs/plugin-vue"
import tailwind from 'tailwindcss'
import autoprefixer from 'autoprefixer'

export default defineConfig()
	.withPostCSS([
		tailwind,
		autoprefixer
	])
	.withPlugin(vue)