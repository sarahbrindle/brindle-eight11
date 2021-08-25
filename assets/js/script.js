jQuery(document).ready(function() {
  jQuery('.top-bar').scrollToFixed();
});

jQuery( document ).ready( function( $ ) {
    $( '.close-bar' ).on( 'click', function( e ) {
        e.preventDefault();

        $( 'body' ).css( 'transformY', '-145px' ); /* height of top bar */
    } );
} );

jQuery( document ).ready( function( $ ) {
    $( ".full-list" ).each(function( i ) {         
        if( $(this).length )         // use this if you are using id to check
        {
            $(this).children('li:gt(4)').hide();
        }
    });
    $( '.view-full-list' ).on( 'click', function( e ) {
        e.preventDefault();         
        $(this).parent().parent().find(".full-list").children('li:gt(4)').show();
    } );
} );

jQuery(document).ready(function($) {
    $('.popup-video-outer .gb-container-link').magnificPopup({
        type: 'iframe'
    });
});