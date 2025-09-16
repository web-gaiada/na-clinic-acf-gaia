/**
 * Container Plugin - modifies Tailwind’s default container.
 */
const containerStyles = ({ addComponents }) => {
  const containerBase = {
    maxWidth: '100%',
    marginLeft: 'auto',
    marginRight: 'auto',
    paddingLeft: '30px',
    paddingRight: '30px',
    '@screen lg': {
      paddingLeft: '40px',
      paddingRight: '40px'
    },
    '@screen 2xl': {
      paddingLeft: '75px',
      paddingRight: '75px'
    }
  };

  addComponents({
    '._container': {
      ...containerBase,
      '@screen xl': {
        width: '100%',
        maxWidth: '1400px',
        paddingLeft: '3.75rem',
        paddingRight: '3.75rem',
      },
      '@screen 2xl': {
        maxWidth: '1680px!important'
      },
    },
    '.container-fluid': {
      ...containerBase,
      '@screen lg': {
        paddingLeft: '45px',
        paddingRight: '45px'
      }
    },
  });
}

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './footer.php',
    './header.php',
    './index.php',
    './single.php',
    './single-post.php',
    './parts/**/*.php',
    './parts/*.php',
    './blocks/**/*.php',
    './src/scss/**/*.scss',
    './src/js/**/*.js',
    './template-parts/*.php',
    './templates/*.php',
    './dump.html'
    // './src/js/*.js',
  ],
  safelist: [
    'text-center',
    {
      pattern: /^text-theme-(yellow|navy|blue|white|beach|light-(gray|grey)|gray|grey|green|orange|red|soft-(grey|gray))$/,
    },
    {
      pattern: /^text-(headline|h1|h2|h3|body|small|button|quote)$/,
    },
    {
      pattern: /col-start-./,
      variants: ['md']
    },
    "lg:text-left",
    "text-center",
    "mobile:hidden",
    'text-theme-gold',
    'text-theme-ivory',
    'text-theme-black',
    'text-theme-soft-gold',
    'text-theme-champagne',
    'text-theme-blacker',
    'text-theme-light-grey',
    'text-theme-light-gray',
    'text-theme-dark-grey',
    'text-theme-dark-gray',
  ],
  theme: {
    container: {
      center: true,
    },
    // fontSize: {
    //   '5xl': '2.75rem'
    // },
    fontFamily: {
      sans: ['"Quicksand"', 'sans-serif'],
      serif: ['"Playfair Display"', 'serif'],
    },
    extend: {
      inset: {
        'unset': 'unset'
      },
      screens: {
        lg: "1025px",
        mobile: {max: '768px'}
      },
      zIndex: {
        header: 999
      },
      colors: {
        'theme-gold': '#D4B888',
        'theme-ivory': '#FFFBF3', 
        'theme-black': '#1C1915', 
        'theme-soft-gold': '#D4B888E5',
        'theme-champagne': '#F9EBCB',
        'theme-blacker': '#1C1915',
        'theme-navy': '#2C3E58',
        'theme-dark-gray': '#747C7A',
        'theme-dark-grey': '#747C7A',
        'theme-light-gray': '#AEAAA0',
        'theme-light-grey': '#AEAAA0',
      },
      fontSize: {
        'h1': '96px',
        'h2': '64px',
        'h3': '40px',
        'h4': '32px',
        'subtitle': '26px',
        'body-big': '24px',
        'body': '20px',
        'caption': '16px',
        'small': '14px',
        'button': '18px',
        'quote': '20px',
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    containerStyles,
  ],
  corePlugins: {
    // preflight: false
  }
  // important: true,
}