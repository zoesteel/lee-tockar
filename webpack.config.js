const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const defaultWPConfig = require( '@wordpress/scripts/config/webpack.config' );

module.exports = {
  entry: {	
		style: path.resolve( __dirname, 'src/scss/style.scss' ),
		editor: path.resolve( __dirname, 'src/scss/editor.scss' ),
},
  output: {
    path: path.resolve( process.cwd(), 'assets/js' ),
    filename: '[name].js',
  },
	plugins: [
		...defaultWPConfig.plugins,
		new MiniCssExtractPlugin( {
			filename: '../css/[name].css',
		} ),
    // Uncomment this if you want to use CSS Live reload
    new BrowserSyncPlugin({
      proxy: 'http://localhost:8888/lee-two/',
      files: [ 'assets/js' + '/*.css' ],
      injectCss: true,
    }, { reload: true, }),
  ],
	mode: 'development',
  module: {
		...defaultWPConfig.module,
		rules: [
			...defaultWPConfig.module.rules,
      {
				test: /\.(png|jpe?g|gif)$/i,
				use: {
					loader: 'url-loader',
					options: {
						emitFile: false,
						name: '[name].[ext]',
						outputPath: '../images',
					},
				},
			}
    ]
  },
};
