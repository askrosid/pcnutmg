/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php"],
  darkMode: 'class',
  theme: {
    extend: {
      fontFamily: {
        montserrat: ['Montserrat', 'sans-serif']
      },
      colors: {
        'brand': {
          100: '#32baa6',
          200: '#009b8e',
          300: '#018a7e'
        },
        'textlight': {
          100: '#414357',
          200: '#191b32'
        },
        'textdark': {
          100: '#f9f9f9',
          200: '#c4c4c4'
        },
        'bglight': {
          100: '#ffffff',
          200: '#f9f9f9'
        },
        'bgdark': {
          100: '#1f242b',
          200: '#232931'
        },
        'border': {
          100: '#e0e0e0',
          200: '#343940'
        }
      }
    },
  },
  plugins: [],
}
