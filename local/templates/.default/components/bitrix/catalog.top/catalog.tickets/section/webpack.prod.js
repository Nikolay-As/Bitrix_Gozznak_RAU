const path = require('path');
const merge = require('webpack-merge');
const common = require('./webpack.common.js');
const CleanWebpackPlugin = require('clean-webpack-plugin');

/** НУЖНО УКАЗАТЬ ПУТЬ ДО ПАПКИ dist ИЗ КОРНЯ САЙТА (например '/local/webpack/dist/') */
const publicPath = '/local/templates/.default/components/bitrix/catalog.top/catalog.tickets/section/dist/';


module.exports = merge.smart(common, {
    mode: 'production',
    output: {
        filename: '[name].[hash].js',
        chunkFilename: '[id].[hash].js',
        path: path.resolve(__dirname, 'dist'),
        publicPath: publicPath
    },
    plugins: [
        new CleanWebpackPlugin('dist', {})
    ],
    module: {
        rules: [
            {
                test: /\.(eot|woff(2)?|ttf|svg)$/i,
                use: [
                    {
                        loader: 'url-loader',
                        options: {
                            limit: 8064, // Convert images < 8kb to base64 strings
                            name: 'fonts/[hash]-[name].[ext]',
                            publicPath: publicPath
                        }
                    }]
            },
            {
                test: /\.(gif|png|jpe?g)$/i,
                use: [
                    {
                        loader: 'url-loader',
                        options: {
                            limit: 8064, // Convert images < 8kb to base64 strings
                            name: 'img/[hash]-[name].[ext]',
                            publicPath: publicPath
                        }
                    }]
            }
        ]
    }
});
