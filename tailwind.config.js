/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}", "./templates/**/*.php"],
  theme: {
    colors: {
      'beige': "#bda18a",
      'creme': "#d9cbb6",
      'comm': "#F5EFE6",
      'marron': "#8B6F57",
      'gris': "#333333",
      'blanc': "#f5f5f5",
      'blanc_full': "#ffffff",
    },
    extend: {
      boxShadow: {
        'head': '4px 8px 16px 0 rgba(0, 0, 0, 0.12)',
        'frame': '0px 8px 16px 0 rgba(0, 0, 0, 0.12)',
      },
      fontFamily: {
        'playfair': ['Playfair Display', 'serif'],
        'poppins': ['Poppins', 'sans-serif'],
      },
      aspectRatio: {
        '3/4': '3 / 4',
      },
    },
  },
  plugins: [],
}