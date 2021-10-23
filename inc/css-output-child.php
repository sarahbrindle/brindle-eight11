<?php
	

	/*add_action( 'enqueue_block_editor_assets', function() {
	    if ( function_exists( 'wp_get_custom_css_post' ) ) {
	        wp_add_inline_style( 'generate-block-editor-styles',wtp_base_css() );
	    }
	}, 50 );*/

	add_action( 'enqueue_block_editor_assets', function() {	    
	        wp_add_inline_style( 'generate-block-editor-styles',wtp_base_css() );	   
	}, 50 );

	add_action( 'wp_enqueue_scripts', function() {
	    wp_add_inline_style( 'generate-style', wtp_base_css() );
	}, 100 );

	function wtp_base_css() {
			if ( ! function_exists( 'generate_get_defaults' ) ) {
		        return;
		    }

			$generate_settings  = wp_parse_args(
				get_option( 'generate_settings', array() ),
				generate_get_defaults()
			);
			if ( ! class_exists( 'GeneratePress_CSS' ) ) {
		        return;
		    }
			$css = new GeneratePress_CSS;
			/*Header Button*/
			$css->set_selector( '.main-navigation .main-nav ul li.nav-btn a' );
			$css->add_property( 'background-color', $generate_settings['form_button_background_color'] );
			$css->add_property( 'color', $generate_settings['form_button_text_color'] );

			$css->set_selector( '.main-navigation .main-nav ul li.nav-btn a:hover' );
			$css->add_property( 'background-color', $generate_settings['form_button_background_color_hover'] );
			$css->add_property( 'color', $generate_settings['form_button_text_color_hover'] );

			/*Responsive Tab*/
			$css->set_selector( '.resp-tab-item,.resp-tabs-list li.resp-tab-active:hover' );
			$css->add_property( 'background-color', $generate_settings['form_button_background_color'].'!important' );
			$css->add_property( 'color', $generate_settings['form_button_text_color'].'!important' );

			$css->set_selector( '.resp-tabs-list li.resp-tab-active, .resp-tab-item:hover' );
			$css->add_property( 'background-color', $generate_settings['form_button_background_color_hover'].'!important' );
			$css->add_property( 'color', $generate_settings['form_button_text_color_hover'].'!important' );

			/*Gallery Filter*/
			$css->set_selector( '.vp-filter__item a' );
			$css->add_property( 'background-color', $generate_settings['form_button_background_color'].'!important' );
			$css->add_property( 'color', $generate_settings['form_button_text_color'].'!important' );

			$css->set_selector( '.vp-filter__item.vp-filter__item-active a,.vp-filteritem a:hover, .vp-filter_item a:focus,.vp-filter__item a:hover' );
			$css->add_property( 'background-color', $generate_settings['form_button_background_color_hover'].'!important' );
			$css->add_property( 'color', $generate_settings['form_button_text_color_hover'].'!important' );


			/*Floor Plan Filter*/
			$css->set_selector( '.floorplangrid .filters a,.floorplangrid a.button' );
			$css->add_property( 'background-color', $generate_settings['form_button_background_color'].'!important' );
			$css->add_property( 'color', $generate_settings['form_button_text_color'].'!important' );

			$css->set_selector( '.floorplangrid .filters a.active,.floorplangrid .filters a:hover,.floorplangrid a.button:hover' );
			$css->add_property( 'background-color', $generate_settings['form_button_background_color_hover'].'!important' );
			$css->add_property( 'color', $generate_settings['form_button_text_color_hover'].'!important' );


			//do_action( 'generate_base_css', $css );

			return apply_filters( 'wtp_base_css_output', $css->css_output() );
	}
