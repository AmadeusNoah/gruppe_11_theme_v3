( function( api ) {

	// Extends our custom "orphans-lite" section.
	api.sectionConstructor['orphans-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );