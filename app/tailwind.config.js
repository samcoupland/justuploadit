import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "selector",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                serif: ["nato serif", ...defaultTheme.fontFamily.serif],
                sans: ["lato", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "primary-light": "#f4ede4",
                "primary-color" : "#e2802e",
                "primary-dark": "#d36d09",
                "primary-highlight": "#fcbb7c",
                "main-dark": "#283944",
                "main-light": "#f5f5f5",
            },
        },
    },
    plugins: [forms],
};
