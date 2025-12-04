module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#2B1B64",   // Ungu gelap
                accent: "#F2C94C",    // Kuning
                ivory: "#F7F7F2",     // Putih gading
            },
            animation: {
                'gradient': 'gradient 15s ease infinite',
                'float': 'float 3s ease-in-out infinite',
              },
              keyframes: {
                gradient: {
                  '0%, 100%': { backgroundPosition: '0% 50%' },
                  '50%': { backgroundPosition: '100% 50%' },
                },
                float: {
                  '0%, 100%': { transform: 'translateY(0px)' },
                  '50%': { transform: 'translateY(-10px)' },
                },
        },
    },
    plugins: [],
}};
