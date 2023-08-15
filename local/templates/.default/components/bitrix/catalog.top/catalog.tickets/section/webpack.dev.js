const path = require('path');
const common = require('./webpack.common.js');
const merge = require('webpack-merge');
const webpack = require('webpack');
const publicPath = 'http://localhost:8080/';

module.exports = merge.smart(common, {
    mode: 'development',
    devtool: 'inline-source-map',
    output: {
        filename: 'bundle.js',
        chunkFilename: '[name].[hash].bundle.js',
        path: path.resolve(__dirname, 'dist'),
        publicPath: publicPath
    },
    devServer: {
        port: 8080,
        host: 'localhost',
        allowedHosts: [
            'localhost',
            'museum.goznak.bitrx24.com'
        ],
        headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Methods": "GET, POST, PUT, DELETE, PATCH, OPTIONS",
            "Access-Control-Allow-Headers": "X-Requested-With, content-type, Authorization"
        }
    },
    plugins: [
        new webpack.HotModuleReplacementPlugin()
    ],
    module: {
        rules: [
            {
                test: /\.(eot|woff(2)?|ttf|svg)$/i,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
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

