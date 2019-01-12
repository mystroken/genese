const path = require( 'path' );

module.exports = {
	THEME_NAME: 'genese',
	PROXY_TARGET: 'https://tehillah.dev',
	HOST: 'localhost',
	PORT: 3000,
	PATHS: {
		src: unipath( path.resolve( __dirname, 'src' ) ),
		compiled: unipath( path.resolve( __dirname, 'dist' ) ),
		modules: unipath( 'node_modules' ),
		base: unipath( '.' )
	}
};

function unipath( base ) {
	return function join() {
		const _paths = [ base ].concat( Array.from( arguments ) );
		return path.resolve( path.join.apply( null, _paths ) );
	};
}
