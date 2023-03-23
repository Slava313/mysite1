( function( api ) {
	// Extends our custom "dream-home" section.
	api.sectionConstructor['dream-home'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );