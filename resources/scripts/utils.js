const { THEME_NAME, PATHS } = require( '../assets/config' );
const fs = require( 'fs-extra' );
const readline = require( 'readline' );
const fileHound = require( 'filehound' );


function getEnv() {
	const target = process.env.npm_lifecycle_event;

	switch ( target ) {
	case 'start':
		return 'development';

	case 'build':
		return 'production';

	default:
		return 'development';
	}
}


function getFilesByExtension( path, ext ) {
	return fileHound
		.create()
		.paths( path )
		.discard( 'node_modules' )
		.discard( 'dist' )
		.ext( ext )
		.depth( 1 )
		.find()
	;
}


function getScreenshot( path ) {
	return fileHound
		.create()
		.paths( path )
		.depth( 0 )
		.glob( 'screenshot.png' )
		.find()
	;
}


function getDest( file ) {
	return PATHS.compiled( file.replace( `sass${path.sep}`, '' ).replace( `src${path.sep}`, '' ) );
}


module.exports = {
	getEnv,
	getFilesByExtension,
	getScreenshot
};
