const colors = require('tailwindcss/colors')

module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: [
      './resources/views/**/*.blade.php',
      './resources/js/**/*.vue',
  ],
  variants: {},
  plugins: [],
}
