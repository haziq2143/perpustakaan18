/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php", // Cek path yang benar
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        boxShadow: {
          'custom': '0px 0px 5px 0px rgba(0,0,0,0.5);'
        },
        backgroundImage: {
          'login': "url('/images/login.png')",
        },
        colors: {
            'primary' : '#1C5F33',
            'accent' : '#FFD966',
            'netral' : '#F0F0F0'
          }
      },
      
    },
    plugins: [],
  }
  