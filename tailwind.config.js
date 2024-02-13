/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/css/*.css",
  ],
  fontFamily:{

  },
  backgrounmdImage:{
    primary: 'DM Serif Display',
  },
  theme: {
    extend: {
      colors: {
        transparent: 'transparent',
        white: '#fff',
        cream:'#CAC6C0',
        wood:'#7E7366',
        gold:'#5E452A',
        brown:'#2E2824',
        darkBrown:'#12100E',
      }
    },
  },
  plugins: [],
}
module.exports = {
  darkMode: 'class',
  // ...
}

