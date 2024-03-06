const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
    "./templates/*.html.twig",
  ],
  theme: {
    extend: {
      colors: {
        gray: colors.slate,
        zinc: colors.slate,
        danger: colors.rose,
        primary: ["#B9FF66"],
        yellow: colors.yellow,
        black: colors.black,
        white: colors.white,
        success: colors.green,
        warning: colors.yellow,
        dark: [
            "#191A23",
            "#292A32",
        ],
        creme: ["#BDBDBD"]
      },
    },
  },
  plugins: [],
}

