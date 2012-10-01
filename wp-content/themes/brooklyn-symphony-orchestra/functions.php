<?php
add_filter( 'pre_get_posts', 'my_get_posts' );
function my_get_posts( $query ) {
	if ( is_home() && false == $query->query_vars['suppress_filters'] )
		$query->set( 'post_type', array( 'post', 'event', 'events' ) );
	return $query;
}

class Custom_Editor_Styles {

	/**
	 * Server path to the plugin folder
	 *
	 * @var string
	 */
	public $plugin_dir;

	/**
	 * URL to the plugin folder
	 *
	 * @var string
	 */
	public $plugin_url;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->plugin_dir = dirname( __FILE__ );
		$this->plugin_url = plugins_url( basename( dirname( __FILE__ ) ) );

		add_filter( 'tiny_mce_before_init', array( $this, 'tiny_mce_before_init' ) );
		add_filter( 'mce_buttons_2', array( $this, 'mce_buttons_2' ) );
		add_action( 'admin_init', array( $this, 'add_editor_style' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_custom_styles' ) );
	}

	/**
	 * Define custom styles for the dropdown menu
	 *
	 * @param array $settings Existing custom styles in TinyMCE
	 * @return array
	 */
	public function tiny_mce_before_init( $settings ) {
		$style_formats = array(
			array(
				'title'    => 'Composer',
				'block' => 'h2',
				'classes'  => 'composer',
			),
			array(
				'title'   => 'Piece',
				'block'   => 'h3',
				'classes' => 'piece',
			),
			array(
				'title'		=> 'Soloist',
				'block'	=> 'p',
				'classes'	=> 'soloist',
			),
		);

		$settings['style_formats'] = json_encode( $style_formats );

		return $settings;
	}

	/**
	 * Add the Styles dropdown to the visual editor
	 *
	 * @param array $buttons Array of buttons already registered
	 * @return array
	 */
	public function mce_buttons_2( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}

	/**
	 * Load a custom stylesheet in the visual editor
	 *
	 * The path in the add_editor_style function is relative to the theme root.
	 *
	 * @return void
	 */
	public function add_editor_style() {
		add_editor_style( '../../plugins/' . basename( dirname( __FILE__ ) ) . '../../themes/brooklyn-symphony-orchestra/style.css' );
	}

	/**
	 * Load a custom stylesheet on the website
	 *
	 * @return void
	 */
	public function enqueue_custom_styles() {
		wp_enqueue_style(
			'custom-editor-styles',
			$this->plugin_url . '/custom-styles.css',
			array(),
			'1.1',
			'all'
		);
	}

}

// Developers, start your engines.
$Custom_Editor_Styles = new Custom_Editor_Styles();

// makes featured image linke to post permalink
add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );

function my_post_image_html( $html, $post_id, $post_image_id ) {

  $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
  return $html;

}

/*
Style Format Options

=========================================================================================
Array Key                     Meaning
=========================================================================================
title [required]              label for this dropdown item
-----------------------------------------------------------------------------------------
selector|block|inline         "selector" limits the style to a specific HTML
[required]                    tag, and will apply the style to an existing tag
                              instead of creating one

                              "block" creates a new block-level element with the
                              style applied, and will replace the existing block
                              element around the cursor

                              "inline" creates a new inline element with the style
                              applied, and will wrap whatever is selected in the
                              editor, not replacing any tags
-----------------------------------------------------------------------------------------
classes [optional]            space-separated list of classes to apply to the
                              element
-----------------------------------------------------------------------------------------
styles [optional]             array of inline styles to apply to the element
                              (two-word attributes, like font-weight, are written
                              in Javascript-friendly camel case: fontWeight)
-----------------------------------------------------------------------------------------
attributes [optional]         assigns attributes to the element (same syntax as styles)
-----------------------------------------------------------------------------------------
wrapper [optional,            if set to true, creates a new block-level element
default = false]              around any selected block-level elements
-----------------------------------------------------------------------------------------
exact [optional,              disables the "merge similar styles" feature, needed
default = false]              for some CSS inheritance issues
=========================================================================================

/*
add_action('init', 'create_concert_type');
function create_concert_type() {
  register_post_type('bso_concert',
    array(
      'labels' => array(
        'name'               => __('Concerts'),
        'singular_name'      => __('Concert'),
        'add_new'            => __('Add Concert'),
        'add_new_item'       => __('Add New Concert'),
        'edit'               => __('Edit'),
        'edit_item'          => __('Edit Concert'),
        'new_item'           => __('New Concert'),
        'view'               => __('View Concert'),
        'search_items'       => __('Search Concerts'),
        'not_found'          => __('No concerts found'),
        'not_found_in_trash' => __('No concerts found in Trash')
      ),
      'public'      => true,
      'has_archive' => true,
      'show_ui'     => true,
      'rewrite' => array(
        'slug' => 'concerts'
      ),
      'supports' => array(
        'custom_fields'
      )
    )
  );
}

add_action('admin_init', 'add_metaboxes');
function add_metaboxes() {

}
*/
?>