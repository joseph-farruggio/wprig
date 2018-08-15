'use strict';

module.exports = {
	theme: {
		slug: 'biz_rocket',
		name: 'Biz Rocket',
		author: 'Joseph Farruggio'
	},
	dev: {
		browserSync: {
			live: true,
			proxyURL: 'biz-rocket.local',
			bypassPort: '8181'
		},
		browserslist: [ // See https://github.com/browserslist/browserslist
			'> 1%',
			'last 2 versions'
		],
		debug: {
			styles: false, // Render verbose CSS for debugging.
			scripts: false // Render verbose JS for debugging.
		}
	},
	export: {
		compress: true
	}
};
