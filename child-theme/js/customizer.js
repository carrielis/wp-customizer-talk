( function( $ ) {

    // Demo one.
    wp.customize( 'dtg_phone_number', function( value ) {

        // Update the HTML value of the phone number element.
        value.bind( function( newval ) {
            $( '.phone-number' ).text( newval );
        } );

    } );

    // Demo two.
    wp.customize( 'dtg_title_colour', function( value ) {

        // Change the colour of the title elment.
        value.bind( function( newval ) {
            $( '.site-title a' ).css( 'color', newval );
        } );

    } );

    // Demo three
    wp.customize( 'dtg_logo', function( value ) {

        // Update the logo.
        value.bind( function( newval ) {
            $( '.logo img' ).remove();

            if ( newval ) {
                $( '.logo' ).append( '<img src="' + newval + '"/>' );
            }
        } );
    } );

    wp.customize( 'dtg_heading_text', function( value ) {

        // Update all the heading tags - extreme case!
        value.bind( function( newval ) {
            $( 'h1, h2, h3, h4, h5, h6' ).html( newval );
        } );

    } );

    wp.customize( 'dtg_paragraph_text', function( value ) {

        // Update all the paragraph text - extreme case!
        value.bind( function( newval ) {
            $( 'p' ).html( newval );
        } );

    } );

    wp.customize( 'dtg_sidebar', function( value ) {

        // Change the background colour of the sidebar.
        value.bind( function( newval ) {
            $( '.sidebar' ).css( 'background-color', newval );
        } );

    } );

    wp.customize( 'dtg_background', function( value ) {

        // Change the background colour of the body tag.
        value.bind( function( newval ) {
            $( 'html, body' ).css( 'background-color', newval );
        } );

    } );

} )( jQuery );
