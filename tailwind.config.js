/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.html", "./visites/index.html", "./404.html", "./{en,es,ca}/**/*.html"],
  theme: {
    extend: {
      colors: {
        terre: {
          50: "#faf7f1",
          100: "#f1ebe0",
          200: "#e7dfd4",
          300: "#d4c4b0",
          400: "#b59880",
          500: "#9a7758",
          600: "#7a5638",
          700: "#5a4028",
          800: "#3d2c1c",
          900: "#22180f",
        },
        vigne: {
          400: "#a8693a",
          500: "#8a4f2a",
          600: "#6b3b1f",
        },
        feuille: {
          500: "#6b7a4f",
          600: "#525e3c",
        },
      },
      fontFamily: {
        serif: ['"Averia Serif Libre"', "Georgia", "serif"],
        sans: ['"Raleway"', "system-ui", "sans-serif"],
      },
    },
  },
};
