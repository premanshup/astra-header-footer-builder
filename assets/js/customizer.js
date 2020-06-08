( function( $, api ) {
  var $window = $( window ),
  $document = $( document ),
  $body = $( 'body' );
/**
 * API on ready event handlers
 *
 * All handlers need to be inside the 'ready' state.
 */
wp.customize.bind( 'ready', function() {

      /**
   * Resize Preview Frame when show / hide Builder.
   */
  // var resizePreviewer = function() {
  // 	var $section = $( '.control-section.kadence-builder-active' );
  // 	var $footer = $( '.control-section.kadence-footer-builder-active' );
  // 	if ( $body.hasClass( 'kadence-builder-is-active' ) || $body.hasClass( 'kadence-footer-builder-is-active' ) ) {
  // 		if ( $body.hasClass( 'kadence-footer-builder-is-active' ) && 0 < $footer.length && ! $footer.hasClass( 'kadence-builder-hide' ) ) {
  // 			wp.customize.previewer.container.css( 'bottom', $footer.outerHeight() + 'px' );
  // 		} else if ( $body.hasClass( 'kadence-builder-is-active' ) && 0 < $section.length && ! $section.hasClass( 'kadence-builder-hide' ) ) {
  // 			wp.customize.previewer.container.css({ "bottom" : $section.outerHeight() + 'px' });
  // 		} else {
  // 			wp.customize.previewer.container.css( 'bottom', '');
  // 		}
  // 	} else {
  // 		wp.customize.previewer.container.css( 'bottom', '');
  // 	}
  // }
  // $window.on( 'resize', resizePreviewer );
  // wp.customize.previewedDevice.bind(function( device ) {
  // 	setTimeout(function() {
  // 		resizePreviewer();
  // 	}, 250 );
  // });

      /**
   * Init Header & Footer Builder
   */
  var initHeaderBuilderPanel = function( panel ) {
    var section =  wp.customize.section( 'section-header-builder' ),
      $section = section.contentContainer;
      // section_layout =  wp.customize.section( 'kadence_customizer_header_layout' );
    // If Header panel is expanded, add class to the body tag (for CSS styling).
    panel.expanded.bind(function( isExpanded ) {
      _.each(section.controls(), function( control ) {
        if ( 'resolved' === control.deferred.embedded.state() ) {
          return;
        }
        control.renderContent();
        control.deferred.embedded.resolve(); // This triggers control.ready().
        
        // Fire event after control is initialized.
        control.container.trigger( 'init' );
      });

      if ( isExpanded ) {
        $body.addClass( 'kadence-builder-is-active' );
        $section.addClass( 'kadence-builder-active' );
      } else {
        $body.removeClass( 'kadence-builder-is-active' );
        $section.removeClass( 'kadence-builder-active' );
      }
      // _.each(section_layout.controls(), function( control ) {
      // 	if ( 'resolved' === control.deferred.embedded.state() ) {
      // 		return;
      // 	}
      // 	control.renderContent();
      // 	control.deferred.embedded.resolve(); // This triggers control.ready().
        
      // 	// Fire event after control is initialized.
      // 	control.container.trigger( 'init' );
      // });
      // resizePreviewer();
    });
    // Attach callback to builder toggle.
    $section.on( 'click', '.kadence-builder-tab-toggle', function( e ) {
      e.preventDefault();
      $section.toggleClass( 'kadence-builder-hide' );
      // resizePreviewer();
    });

  };
      wp.customize.panel( 'panel-hfb', initHeaderBuilderPanel );
      
  });
} )( jQuery, wp );