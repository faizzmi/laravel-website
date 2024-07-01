/** @type {import('tailwindcss').Config} */
module.exports = {
  theme: {
    extend: {
      colors: {
        accent: '#0000ff',
      },
    },
  },
  variants: {
    extend: {
      textColor: ['hover'],
    },
  },
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/css/*.css",
  ],
  fontFamily:{
    primary: 'DM Serif Display',
  },
    extend: {
      backgroundImage:{
        photo: "{{asset('assets/images/w5.jpg')}}",
      },
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
  plugins: [],
};

