module.exports = {
	dist: {
		options: {
			processors: [
				require('autoprefixer')({browsers: 'last 2 versions'})
			]
		},
		files: { 
			'assets/css/regional-stripe.css': [ 'assets/css/regional-stripe.css' ]
		}
	}
};