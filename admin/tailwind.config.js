/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./vendor/livewire/livewire/src/Features/SupportPageComponents/resources/views/**/*.blade.php",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#fef5f8',
          100: '#fce7f0',
          200: '#fad4e4',
          300: '#f7b3cd',
          400: '#f282ab',
          500: '#e8508a',
          600: '#d63069',
          700: '#b91f51',
          800: '#991d45',
          900: '#801c3d',
        },
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

