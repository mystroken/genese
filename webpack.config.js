const path = require('path');
const webpack = require('webpack');
const WriteFilePlugin = require('write-file-webpack-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const Visualizer = require('webpack-visualizer-plugin');

const THEME_NAME = 'genese';
const HOST = 'localhost';
const PORT = 3000;

module.exports = {
	mode: 'development',
	entry: [
		// `reload=true` to automatically reload of HMR gets in a jam.
		`webpack-hot-middleware/client?https://${HOST}:${PORT}&reload=true`,
		'./assets/src/js/index.js',
		// !important, make sure an actual 'style.css' file ends up in the build directory
		'./assets/src/scss/style.scss'
	],

	output: {
		// for simplicity, you can do build directly into local WP theme folder
		// however, I prefer to build in my project 'dist' folder, and symlink via vagrant (or w/e tool you use, nginx?)
		path: `/www/tehillah24/wp-content/themes/${THEME_NAME}/assets/dist`,

		// public path is your proxy server + theme path on the server
		// for production, use '/'
		publicPath: `//${HOST}:${PORT}/wp-content/themes/${THEME_NAME}/assets/dist/`,
		filename: 'js/app.js'
	},

	devtool: '#source-map',

  devServer: {
    contentBase: path.join(__dirname, 'assets/src'),
    watchContentBase: true,
    hot: true
  },

	module: {
	  rules: [
		{
		  test: /\.js$/,
		  exclude: /node_modules/,
		  use: {
			loader: 'babel-loader'
		  }
		},
		{
		  test: /\.scss$/,
		  use: [
			'css-loader',
			'sass-loader'
		  ]
		}
	  ]
	},

	optimization: {
	  runtimeChunk: 'single',
	  splitChunks: {
		cacheGroups: {
		  vendor: {
			test: /[\\/]node_modules[\\/]/,
			name: 'vendors',
			chunks: 'all'
		  }
		}
	  },
	  minimizer: [new UglifyJsPlugin()],
	},

	plugins: [
		new webpack.HotModuleReplacementPlugin(),

		new MiniCssExtractPlugin(),
		new OptimizeCssAssetsPlugin(),
		new Visualizer({ filename: './stat.html' }),

		// unnecessary, but nice.
		// Webpack normally doesn't output files during the dev build, this will output your assets to your build path
		// If you visit the local wp URL instead of the proxy, your assets will be there
		new WriteFilePlugin()
	]
};
