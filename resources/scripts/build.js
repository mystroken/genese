/* eslint-disable */
const { PATHS } = require( '../assets/config' );
const utils = require( './utils' );
const webpack = require( 'webpack' );
const fs = require( 'fs-extra' );
const webpackConfig = require( '../assets/webpack.config' );

const compiler = webpack( webpackConfig );


const notify = ( err, stats ) => {
	if ( err ) {
		console.error( err );
		return;
	}
	console.log( stats.toString({ colors: true }) );
};


const webpackBuild = () => {
	console.log( 'Running webpack build...' );
	return fs.emptyDir( PATHS.compiled(), () => compiler.run( notify ) );
};


const run = () => webpackBuild();


// Runs the script...
run();
