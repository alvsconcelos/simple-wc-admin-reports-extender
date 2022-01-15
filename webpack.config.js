const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const config = {
  entry: {
    'admin/js/simple-wc-admin-reports-extender-admin': path.resolve(__dirname, 'src/admin/js/index.js'),
    'public/js/simple-wc-admin-reports-extender-public': path.resolve(__dirname, 'src/public/js/index.js'),
  },
  output: {
    path: path.resolve(__dirname, 'assets/'),
    filename: '[name].js',
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        use: 'babel-loader',
        exclude: /node_modules/
      },
      {
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader,
          { loader: 'css-loader', options: { url: false } }
        ]
      },
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          { loader: 'css-loader', options: { url: false } },
          'sass-loader'
        ]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: ({ chunk }) => `${chunk.name.replace('/js/', '/css/')}.css`,
    })
  ],
  externals: {
    jquery: 'jQuery',
  },
};

module.exports = config;