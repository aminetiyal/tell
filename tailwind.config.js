const tailwindUI = require('@tailwindcss/ui');
const defaultTheme = require('tailwindcss/defaultTheme');


module.exports = {
    purge: false,
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            padding: {
                '17': '4.25rem',
                '18': '4.5rem',
                '19': '4.75rem',
                // 20 exists
                '21': '5.25rem',
                '22': '5.5rem',
                '23': '5.75rem',
                // 24 exists
                '25': '6.25rem',
                '26': '6.5rem',
                '27': '6.75rem',
                // 28 exists
                '29': '7.25rem',
                '30': '7.5rem',
                '31': '7.75rem',
            },
            margin: {
                '17': '4.25rem',
                '18': '4.5rem',
                '19': '4.75rem',
            },
            fontSize: {
                'xxs': '.60rem'
            }
        },
    },
    variants: {},
    plugins: [
        tailwindUI
    ],
}
