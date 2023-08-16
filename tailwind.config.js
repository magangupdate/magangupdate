module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins"],
                gilroySemiBold: ["Gilroy-SemiBold"],
                gilroyRegular: ["Gilroy-Regular"],
            },
            backgroundImage: {
                "gradient": 'linear-gradient(to left top, #ec8624, #da6530, #c24637, #a42c3b, #83153a, #6f093a, #5a0339, #440135, #370336, #290536, #1a0435, #080033)',
            },
            colors: {
                black: "#0e1012",
                text: "#A0AABA",
                purple1: "#080033",
                purple2: "#540032",
                orange1: "#BC3A5E",
                orange2: "#EC8624",
                violet: "#8195DE",
                grey: "#E0DADE",
            },
        },
    },
    plugins: [require("tailwind-scrollbar-hide")],
};
