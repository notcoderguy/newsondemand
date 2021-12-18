module.exports = {
  purge: [
    "./resources/**/*.blade.php",    
    "./resources/**/*.js",   
    "./resources/**/*.vue",
  ],
  darkMode: 'class', // or 'media' or 'class'
  content: [
    "./resources/**/*.blade.php",    
    "./resources/**/*.js",   
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        gray: {
            0: '#fff',
            100: '#fafafa',
            200: '#eaeaea',
            300: '#999999',
            400: '#888888',
            500: '#666666',
            600: '#444444',
            700: '#333333',
            800: '#222222',
            900: '#111111'
        }
    },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
