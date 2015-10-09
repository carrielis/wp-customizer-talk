( function( $ ) {

    // Demo one
    wp.customize( 'wcmcr_phone_number', function( value ) {

        // Update the HTML value of the phone number element.
        value.bind( function( newval ) {
            $( '.phone-number' ).html( newval );
        } );

    } );

    // Demo two
    wp.customize( 'wcmcr_title_colour', function( value ) {

        // Change the colour of the title elment.
        value.bind( function( newval ) {
            $( '.site-title a' ).css( 'color', newval );
        } );

    } );

    // Demo three
    wp.customize( 'wcmcr_logo', function( value ) {

        // Update the logo.
        value.bind( function( newval ) {
            $( '.logo img' ).remove();
            console.log( newval );
            if ( newval ) {
                $( '.logo' ).append( '<img src="' + newval + '"/>' );
            }
        } );
    } );

    wp.customize( 'wcmcr_heading_text', function( value ) {

        // Update the HTML value of the phone number element.
        value.bind( function( newval ) {
            $( 'h1, h2, h3, h4, h5, h6' ).html( newval );
        } );

    } );

    wp.customize( 'wcmcr_paragraph_text', function( value ) {

        // Update the HTML value of the phone number element.
        value.bind( function( newval ) {
            $( 'p' ).html( newval );
        } );

    } );

    wp.customize( 'wcmcr_sidebar', function( value ) {

        // Change the background colour of the sidebar.
        value.bind( function( newval ) {
            $( '.sidebar' ).css( 'background-color', newval );
        } );

    } );

    wp.customize( 'wcmcr_background', function( value ) {

        // Change the background colour of the body tag.
        value.bind( function( newval ) {
            $( 'html, body' ).css( 'background-color', newval );
        } );

    } );

} )( jQuery );
