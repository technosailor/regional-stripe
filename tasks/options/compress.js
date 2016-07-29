module.exports = {
	main: {
		options: {
			mode: 'zip',
			archive: './release/regstr.<%= pkg.version %>.zip'
		},
		expand: true,
		cwd: 'release/<%= pkg.version %>/',
		src: ['**/*'],
		dest: 'regstr/'
	}
};