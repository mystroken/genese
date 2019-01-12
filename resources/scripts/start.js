global.watch = true;

const path = require( 'path' );
const fs = require( 'fs-extra' );
const browserSync = require( 'browser-sync' ).create();
const webpack = require( 'webpack' );
const webpackDevMiddleware = require( 'webpack-dev-middleware' );
const webpackHotMiddleware = require( 'webpack-hot-middleware' );
const htmlInjector = require( 'bs-html-injector' );
const webpackConfig = require( '../assets/webpack.config' );

const bundler = webpack( webpackConfig );
const { PATHS, PROXY_TARGET } = require( '../assets/config' );


const bsOptions = {
	files: [
		{

			// scss|js managed by webpack
			// optionally exclude other managed assets: images, fonts, etc
			match: [
				`${PATHS.base()}/*.php`,
				`${PATHS.base()}/**/*.php`,
				`${PATHS.base()}/**/**/*.php`
			]//,

			// manually sync everything else
			// fn: synchronize

		}
	],
	proxy: {

		// proxy local WP install
		target: PROXY_TARGET,

		middleware: [

			// converts browsersync into a webpack-dev-server
			webpackDevMiddleware( bundler, {
				publicPath: webpackConfig.output.publicPath,
				noInfo: true
			}),

			// hot update js & css
			webpackHotMiddleware( bundler )

		]
	}
};


// setup html injector, only compare differences within outer most div (#page)
// otherwise, it will replace the webpack HMR scripts
browserSync.use( htmlInjector, {
	restrictions: [ '#page' ]
});


function synchronize( event, file ) {

	// activate html injector
	if ( file.endsWith( 'php' ) ) {
		htmlInjector();
	}
}

fs.emptyDir( PATHS.compiled(), () => (
	browserSync.init( bsOptions )
) );
