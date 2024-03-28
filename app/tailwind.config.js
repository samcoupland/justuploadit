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
    variants: {
        extend: {
            display: ["group-hover"],
        },
    },
    theme: {
        extend: {
            fontFamily: {
                serif: ["nato serif", ...defaultTheme.fontFamily.serif],
                sans: ["lato", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "primary-color" : "#e2802e",
                "primary-light": "#fcbb7c",
                "primary-dark": "#d36d09",
                "primary-highlight": "#f1ebe3",
                "main-dark": "#283944",
                "main-light": "#f5f5f5",
                "border": "#f5eced",
            },
        },
    },
    plugins: [forms],
};
