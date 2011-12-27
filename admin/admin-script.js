jQuery( document ).ready( function( ) {
  var farbtastic;
  function pickColor( color ) {
    farbtastic.setColor( color );
    jQuery( '.obandes-color-picker' ).val( color );
  }
  jQuery( '#pickcolor' ).click( function() {
    jQuery( '#colorpicker-selector' ).show();
    return false;
  });
  jQuery( '#colorpicker-selector' ).each( function() {
    farbtastic = jQuery.farbtastic('#colorpicker-selector', function(color) {
      pickColor(color);
    });
  });
  jQuery( document ).mousedown( function() {
    jQuery( '#colorpicker-selector' ).each(function(){
      var display = jQuery( this ).css( 'display' );
      if ( display == 'block' ) {
        jQuery( this ).fadeOut(2);
          var ed = jQuery( '#newcontent' );
          ed.focus();
          edInsertContent( ed.get( 0 ), jQuery( '.obandes-color-picker1' ).val() );
      }
    });
  });
  function pickColor2( color ) {
	var display = jQuery( '#colorpicker-selector2' ).css( 'display' );
	if ( display == 'block' ) {
		farbtastic.setColor( color );
		jQuery( '.obandes-color-picker2' ).val( color );
	}
  }
  jQuery( '#pickcolor2' ).click( function() {
    jQuery( '#colorpicker-selector2' ).show();
    return false;
  });
  jQuery( '#colorpicker-selector2' ).each( function() {
    farbtastic = jQuery.farbtastic('#colorpicker-selector2', function(color) {
      pickColor2(color);
    });
  });
  jQuery( document ).mousedown( function() {
    jQuery( '#colorpicker-selector2' ).each(function(){
      var display = jQuery( this ).css( 'display' );
      	if ( display == 'block' ) {
        jQuery( this ).fadeOut(2);
          var ed = jQuery( '#newcontent' );
          ed.focus();
          edInsertContent( ed.get( 0 ), jQuery( '.obandes-color-picker2' ).val() );

		}
    });
  });
});
