/** @type {import('tailwindcss').Config} */
module.exports = {
    corePlugins: {
        preflight: false,
    },
    content: ["./widgets/*.{php,html}"],
    theme: {
        extend: {},
    },
    plugins: [],
}