wp.domReady( () => {
	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'white',
		label: 'White',
		isDefault: true,
  } );
	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'black',
		label: 'Black',
		isDefault: false,
  } );
} );
