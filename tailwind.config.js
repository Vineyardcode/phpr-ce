/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
      ],
    theme: {
        extend: {
            colors: {
                'Dark_Slate_Blue': '#474A8A',
                'Toolbox': '#787CB5',
                'Wild_Blue_Yonder': '#B0B3D6',
            }
        },
    },
    plugins: [],
}
