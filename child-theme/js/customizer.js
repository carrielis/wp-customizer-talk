( function( $ ) {

    wp.customize( 'wcmcr_phone_number', function( value ) {

        // Update the HTML value of the phone number element.
        value.bind( function( newval ) {
            $( '.phone-number' ).html( newval );
        } );

    } );

    wp.customize( 'wcmcr_title_colour', function( value ) {

        // Change the colour of the title elment.
        value.bind( function( newval ) {
            $( '.site-title a' ).css( 'color', newval );
        } );

    } );

} )( jQuery );
