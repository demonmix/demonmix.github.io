<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 *
 * Free Position Element ( Draggable )
 * 
 * @author Codevz
 * @copyright Codevz
 * @link http://codevz.com/
 * 
 */
class CDVZ_free_position_element extends Codevz_Plus {

	public function __construct( $name ) {
		$this->name = $name;
	}

	/**
	 *
	 * Shortcode settings ( vc_map )
	 * 
	 * @return array
	 * 
	 */
	public function in() {
		add_shortcode( $this->name, array( $this, 'out' ) );

		Codevz_Plus::vc_map( array(
			'category'		=> CDVZ_VC_CAT,
			'base'			=> $this->name,
			'name'			=> esc_html__( 'Free Position Element', 'codevz' ),
			'description'	=> esc_html__( 'Draggable container', 'codevz' ),
			'icon'			=> 'czi',
			"weight"         => CDVZ_VC_WEIGHT,
			'is_container' 	=> true,
			'js_view'		=> 'VcColumnView',
			'content_element'=> true,
			'params'		=> array(
				array(
					'type' 			=> 'cz_sc_id',
					'param_name' 	=> 'id',
					'save_always' 	=> true
				),
				array(
					'type' => 'cz_slider',
					'heading' => esc_html__( 'Top offset', 'codevz' ),
					'description' => 'e.g. 20px or 20%',
					'edit_field_class' => 'vc_col-xs-99',
					'options' 		=> array( 'unit' => '%', 'step' => 1, 'min' => 1, 'max' => 100 ),
					'param_name' => 'css_top',
					'admin_label' 	=> true
				),
				array(
					'type' 				=> 'cz_slider',
					'heading' 			=> esc_html__( 'Left offset', 'codevz' ),
					'edit_field_class' 	=> 'vc_col-xs-99',
					'options' 		=> array( 'unit' => '%', 'step' => 1, 'min' => 1, 'max' => 100 ),
					'param_name' 		=> 'css_left',
					'admin_label' 		=> true
				),
				array(
					'type' 				=> 'cz_slider',
					'heading' 			=> esc_html__( 'Custom width', 'codevz' ),
					'edit_field_class' 	=> 'vc_col-xs-99',
					'options' 			=> array( 'unit' => 'px', 'step' => 10, 'min' => 0, 'max' => 500 ),
					'param_name' 		=> 'css_width'
				),
				array(
					'type' => 'cz_slider',
					'heading' => esc_html__( 'Custom Rotate', 'codevz' ),
					'edit_field_class' => 'vc_col-xs-99',
					'options' 		=> array( 'unit' => 'deg', 'step' => 1, 'min' => 0, 'max' => 360 ),
					'param_name' => 'css_transform'
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__('Layer Priority', 'codevz'),
					'edit_field_class' => 'vc_col-xs-99',
					'param_name' 	=> 'css_z-index',
					'value'		=> array(
						'-2' => '-2',
						'-1' => '-1',
						'0' => '0',
						'1'	=> '1',
						'2' => '2',
						'3'	=> '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
						'7' => '7',
						'8' => '8',
						'9' => '9',
						'10' => '10',
						'99' => '99',
						'999' => '999',
					),
					'std'			=> '0'
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__('Hover', 'codevz'),
					'edit_field_class' => 'vc_col-xs-99',
					'param_name' 	=> 'onhover',
					'value'		=> array(
						esc_html__( 'Select', 'codevz' ) 						=> '',
						esc_html__( 'Hide on parent hover', 'codevz' ) 			=> 'cz_hide_onhover',
						esc_html__( 'Show on parent hover FadeIn', 'codevz' ) 	=> 'cz_show_onhover',
						esc_html__( 'Show on parent hover FadeUp', 'codevz' ) 	=> 'cz_show_onhover cz_show_fadeup',
						esc_html__( 'Show on parent hover FadeDown', 'codevz' ) => 'cz_show_onhover cz_show_fadedown',
						esc_html__( 'Show on parent hover FadeLeft', 'codevz' ) => 'cz_show_onhover cz_show_fadeleft',
						esc_html__( 'Show on parent hover FadeRight', 'codevz' ) => 'cz_show_onhover cz_show_faderight',
						esc_html__( 'Show on parent hover ZoomIn', 'codevz' ) 	=> 'cz_show_onhover cz_show_zoomin',
						esc_html__( 'Show on parent hover ZoomOut', 'codevz' ) 	=> 'cz_show_onhover cz_show_zoomout',
					)
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__('Loop animation', 'codevz'),
					'edit_field_class' => 'vc_col-xs-99',
					'param_name' 	=> 'animation',
					'value'		=> array(
						esc_html__('Select', 'codevz') 		=> '',
						esc_html__('Animation', 'codevz') . ' 1' 	=> 'cz_infinite_anim_1',
						esc_html__('Animation', 'codevz') . ' 2' 	=> 'cz_infinite_anim_2',
						esc_html__('Animation', 'codevz') . ' 3' 	=> 'cz_infinite_anim_3',
						esc_html__('Animation', 'codevz') . ' 4' 	=> 'cz_infinite_anim_4',
						esc_html__('Animation', 'codevz') . ' 5' 	=> 'cz_infinite_anim_5',
					)
				),

				// Advanced
				array(
					'type' 			=> 'checkbox',
					'heading' 		=> esc_html__( 'Hide on Tablet ?', 'codevz' ),
					'param_name' 	=> 'hide_on_t',
					'edit_field_class' => 'vc_col-xs-6',
					'group' 		=> esc_html__( 'Advanced', 'codevz' )
				), 
				array(
					'type' 			=> 'checkbox',
					'heading' 		=> esc_html__( 'Hide on Mobile ?', 'codevz' ),
					'param_name' 	=> 'hide_on_m',
					'edit_field_class' => 'vc_col-xs-6',
					'group' 		=> esc_html__( 'Advanced', 'codevz' )
				),
				array(
					'type' 			=> 'cz_title',
					'param_name' 	=> 'cz_title',
					'class' 		=> '',
					'content' 		=> esc_html__( 'Parallax', 'codevz' ),
					'group' 		=> esc_html__( 'Advanced', 'codevz' )
				),
				array(
					"type"        	=> "dropdown",
					"heading"     	=> esc_html__( "Parallax", 'codevz' ),
					"param_name"  	=> "parallax_h",
					'edit_field_class' => 'vc_col-xs-99',
					'value'		=> array(
						esc_html__( 'Select', 'codevz' )					=> '',
						
						esc_html__( 'Vertical', 'codevz' )					=> 'v',
						esc_html__( 'Vertical + Mouse parallax', 'codevz' )		=> 'vmouse',
						esc_html__( 'Horizontal', 'codevz' )				=> 'true',
						esc_html__( 'Horizontal + Mouse parallax', 'codevz' )	=> 'truemouse',
						esc_html__( 'Mouse parallax', 'codevz' )				=> 'mouse',
					),
					"group"  		=> esc_html__( 'Advanced', 'codevz' )
				),
				array(
					"type"        	=> "cz_slider",
					"heading"     	=> esc_html__( "Parallax speed", 'codevz' ),
					"description"   => esc_html__( "Parallax is according to page scrolling", 'codevz' ),
					'edit_field_class' => 'vc_col-xs-99',
					"param_name"  	=> "parallax",
					"value"  		=> "0",
					'options' 		=> array( 'unit' => '', 'step' => 1, 'min' => -50, 'max' => 50 ),
					'dependency'	=> array(
						'element'		=> 'parallax_h',
						'value'			=> array( 'v', 'vmouse', 'true', 'truemouse' )
					),
					"group"  		=> esc_html__( 'Advanced', 'codevz' )
				),
				array(
					"type"        	=> "cz_slider",
					"heading"     	=> esc_html__("Mouse speed", 'codevz'),
					"description"   => esc_html__( "Mouse parallax is according to mouse move", 'codevz' ),
					'edit_field_class' => 'vc_col-xs-99',
					"param_name"  	=> "mparallax",
					"value"  		=> "0",
					'options' 		=> array( 'unit' => '', 'step' => 1, 'min' => -30, 'max' => 30 ),
					'dependency'	=> array(
						'element'		=> 'parallax_h',
						'value'			=> array( 'vmouse', 'truemouse', 'mouse' )
					),
					"group"  		=> esc_html__( 'Advanced', 'codevz' )
				),
				array(
					'type' 			=> 'cz_title',
					'param_name' 	=> 'cz_title',
					'class' 		=> '',
					'content' 		=> esc_html__( 'Animation & Class', 'codevz' ),
					'group' 		=> esc_html__( 'Advanced', 'codevz' )
				),
				vc_map_add_css_animation( false ),
				array(
					"type"        	=> "cz_slider",
					"heading"     	=> esc_html__("Animation Delay", 'codevz'),
					"description" 	=> 'e.g. 500ms',
					"param_name"  	=> "anim_delay",
					'options' 		=> array( 'unit' => 'ms', 'step' => 100, 'min' => 0, 'max' => 5000 ),
					'edit_field_class' => 'vc_col-xs-6',
					'group' 		=> esc_html__( 'Advanced', 'codevz' )
				),
				array(
					"type"        	=> "textfield",
					"heading"     	=> esc_html__( "Extra Class", 'codevz' ),
					"param_name"  	=> "class",
					'edit_field_class' => 'vc_col-xs-6',
					'group' 		=> esc_html__( 'Advanced', 'codevz' )
				),

			)

		));
	}

	/**
	 *
	 * Shortcode output
	 * 
	 * @return string
	 * 
	 */
	public function out( $atts, $content = '' ) {
		$atts = vc_map_get_attributes( $this->name, $atts );

		// Styles
		$css = $atts['css_top'] ? 'top:' . $atts['css_top'] . ';' : '';
		$css .= $atts['css_left'] ? 'left:' . $atts['css_left'] . ';' : '';
		$css .= $atts['css_width'] ? 'width:' . $atts['css_width'] . ';' : '';
		$css .= $atts['css_z-index'] ? 'z-index:' . $atts['css_z-index'] . ';' : '';
		$css .= $atts['anim_delay'] ? 'animation-delay:' . $atts['anim_delay'] . ';' : '';
		$css = $css ? ' style="' . $css . '"' : '';
		$in_css = $atts['css_transform'] ? ' style="transform:rotate(' . $atts['css_transform'] . ');"' : '';

		// Classes
		$classes = array();
		$classes[] = 'cz_free_position_element';
		$classes[] = $atts['animation'];
		$classes[] = $atts['onhover'];

		// Data
		$data = Codevz_Plus::$vc_editable ? ' data-top="' . $atts['css_top'] . '" data-left="' . $atts['css_left'] . '"' : '';
		
		// Out
		$out = '<div' . Codevz_Plus::classes( $atts, $classes ) . $data . $css . '><div' . $in_css . '>' . do_shortcode( $content ) . '</div></div>';
		
		return Codevz_Plus::_out( $atts, $out, 'front_end_draggable( ".vc_cz_free_position_element" )' );
	}

}