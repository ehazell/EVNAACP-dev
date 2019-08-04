( function( api ) {

	// Extends our custom "fitness-gymhouse" section.
	api.sectionConstructor['fitness-gymhouse'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );