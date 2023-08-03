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
            color: {
                black: "#0e1012",
                text: "#A0AABA",
            },
        },
    },
    plugins: [require("tailwind-scrollbar-hide")],
};
