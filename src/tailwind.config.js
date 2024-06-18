/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./**/*.{html,js,php,twig}",
        "./templates/**/*.{html,js,php,twig}",
        "./templates/partials/**/*.{html,js,php,twig}"
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ],
}

/* Run this command in Phpstorm terminal to auto rebuild main.css */
// => npx tailwindcss -i css/tailwind.css -o public/css/main.css --watch


