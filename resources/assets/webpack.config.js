const path = require( 'path' );
const url = require( 'url' );
const webpack = require( 'webpack' );
const WriteFilePlugin = require( 'write-file-webpack-plugin' );
const UglifyJsPlugin = require( 'uglifyjs-webpack-plugin' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const OptimizeCssAssetsPlugin = require( 'optimize-css-assets-webpack-plugin' );
const Visualizer = require( 'webpack-visualizer-plugin' );

const { PATHS, HOST, PORT, THEME_NAME, PROXY_TARGET } = require( './config' );
const utils = require( '../scripts/utils' );

const ENV = utils.getEnv();
const WATCH = global.watch || false;

module.exports = {
	mode: ENV,
	entry: getEntry(),

	output: {
		path: PATHS.compiled(),
		publicPath: 'production' === ENV ? '/' : `//${HOST}:${PORT}/wp-content/themes/${THEME_NAME}/resources/assets/dist/`,
		filename: 'js/[name].js',
		sourceMapFilename: '[file].map'
	},

	devtool: 'production' === ENV ? false : '#cheap-source-map',

	devServer: {
		contentBase: path.join( __dirname, 'src' ),
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
				test: /\.(sa|sc|c)ss$/,
				use: [
					( 'production' === ENV ) ? MiniCssExtractPlugin.loader : 'style-loader',
					'css-loader?importLoaders=1',
					'postcss-loader',
					'sass-loader'
				]
			}
		]
	},

	optimization: {
		minimizer: [
			new UglifyJsPlugin({
				cache: true,
				parallel: true,
				sourceMap: true
			}),
			new OptimizeCssAssetsPlugin({})
		]
	},

	plugins: getPlugins( ENV ),

	target: 'web',

	watch: WATCH
};

/*
 * CONFIG ENV DEFINITIONS
 */

function getEntry() {
	const entry = {};
	let proxyURL = `http://${HOST}:${PORT}`;
	entry.app = [ PATHS.src( 'js', 'index.js' ) ];
	entry.app.push( PATHS.src( 'sass', 'style.scss' ) );

	/**
	 * We do this to enable injection over SSL.
	 */
	if ( 'https:' === url.parse( PROXY_TARGET ).protocol ) {
		process.env.NODE_TLS_REJECT_UNAUTHORIZED = 0;
		proxyURL = proxyURL.replace( 'http:', 'https:' );
	}

	switch ( ENV ) {
	case 'development':
		entry.app.unshift( 'webpack/hot/only-dev-server' );
		entry.app.unshift( `webpack-hot-middleware/client?${proxyURL}` );
		break;
	case 'production':
		break;
	}

	return entry;
}


function getPlugins( env ) {
	const plugins = [];

	switch ( env ) {
	case 'production':
		plugins.push( new MiniCssExtractPlugin({ filename: 'css/[name].css' }) );

		//plugins.push();
		break;
	case 'development':

		// unnecessary, but nice.
		// Webpack normally doesn't output files during the dev build, this will output your assets to your build path
		// If you visit the local wp URL instead of the proxy, your assets will be there
		plugins.push( new WriteFilePlugin() );
		plugins.push( new Visualizer({ filename: './stat.html' }) );
		plugins.push( new webpack.HotModuleReplacementPlugin() );
		break;
	}

	return plugins;
}
