/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}", "./templates/**/*.php"],
  theme: {
    colors: {
      'beige': "#bda18a",
      'marron': "#8B6F57",
      'gris': "#333333",
      'blanc': "#f5f5f5",
    },
    fontFamily: {
      'playfair': ['Playfair Display', 'serif'],
      'poppins': ['Poppins', 'sans-serif']
    },
    extend: {},
  },
  plugins: [],
}

