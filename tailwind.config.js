const theme = require('./theme.json');
const balefire = require("@jeffreyvr/tailwindcss-tailpress");

module.exports = {
    darkMode: 'class',
    content: [
        './*.php',
        './**/*.php',
        './build/css/*.css',
        './build/js/*.js',
        'node_modules/preline/dist/*.js',
    ],
    safelist: [
        'text-neutral-*',
        'dark:text-neutral-*',
        'max-w-*',
        'max-w-screen-*',
        'text-*',
        'dark:text-*',
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        extend: {
            colors: balefire.colorMapper(balefire.theme('settings.color.palette', theme)),
            fontSize: balefire.fontSizeMapper(balefire.theme('settings.typography.fontSizes', theme))
        },
        screens: {
            'xs': '480px',
            'sm': '600px',
            'md': '782px',
            'lg': balefire.theme('settings.layout.contentSize', theme),
            'xl': balefire.theme('settings.layout.wideSize', theme),
            '2xl': '1440px'
        }
    },
    plugins: [
        balefire.tailwind,
        require('@tailwindcss/typography'),
        require('@tailwindcss/container-queries'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio')
    ],

};
