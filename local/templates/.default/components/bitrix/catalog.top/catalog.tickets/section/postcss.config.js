module.exports = {
    parser: 'postcss-syntax',
    syntax: 'postcss-syntax',
    stringifier: 'postcss-syntax',
    exec: false,
    plugins: [require('autoprefixer')],
};
