/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './components/**/*.{js,vue,ts}',
    './layouts/**/*.vue',
    './pages/**/*.vue',
    './plugins/**/*.{js,ts}',
    './app.vue',
    './error.vue',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Poppins', 'sans-serif'],
        serif: ['Poppins', 'serif'],
        mono: ['Poppins', 'monospace'],
      },
    },
  },
  plugins: [require('daisyui')],
  daisyui: {
    themes: [
      {
        lightTheme: {
          ...require('daisyui/src/theming/themes')['light'],
          primary: '#38B6FF',
            'primary-focus': '#6487f1',
            'primary-content': 'white',
            secondary: '#eaeaea',
        },
      },
    ],
  },
}