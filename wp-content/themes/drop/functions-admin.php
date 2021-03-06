<?php 

/* Add layout option in Customize. */
add_action( 'customize_register', 'ct_drop_customize_register_logo' );

/**
 * Add logo upload in theme customizer screen.
 *
 * @since 1.0
 */
function ct_drop_customize_register_logo( $wp_customize ) {

	/* Add the layout section. */
	$wp_customize->add_section(
		'ct-upload',
		array(
			'title'      => esc_html__( 'Logo', 'drop' ),
			'priority'   => 60,
			'capability' => 'edit_theme_options'
		)
	);

	/* Add the 'logo' setting. */
	$wp_customize->add_setting(
		'logo_upload',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'logo_image',
				array(
					'label'    => esc_html__( 'Upload custom logo.', 'drop' ),
					'section'  => 'ct-upload',
					'settings' => 'logo_upload',
			)
		)
	);
}

function ct_drop_customizer_social_media_array() {

	// store social site names in array
    $social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'vimeo', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'reddit', 'soundcloud', 'spotify', 'vine','yahoo', 'behance', 'codepen', 'delicious', 'stumbleupon', 'deviantart', 'digg', 'git', 'hacker-news', 'steam', 'vk');
	
	return $social_sites;
}

// add settings to create various social media text areas.
add_action('customize_register', 'ct_drop_add_social_sites_customizer');

function ct_drop_add_social_sites_customizer($wp_customize) {

    /* create custom control for url input so http:// is automatically added */
    class ct_drop_url_input_control extends WP_Customize_Control {
        public $type = 'url';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <input type="url" <?php $this->link(); ?> value="<?php echo esc_url( $this->value() ); ?>" />
            </label>
        <?php
        }
    }

	$wp_customize->add_section( 'ct_drop_social_settings', array(
			'title'          => esc_html__('Social Media Icons','drop'),
			'priority'       => 35,
	) );
		
	$social_sites = ct_drop_customizer_social_media_array();
	$priority = 5;

	foreach($social_sites as $social_site) {

        /* add setting for each social site */
		$wp_customize->add_setting( "$social_site", array(
				'default'        => '',
                'sanitize_callback' => 'esc_url_raw'
		) );
        /* add URL HTML5 input */
		$wp_customize->add_control(
            new ct_drop_url_input_control(
                $wp_customize, $social_site,
                array(
                    'label'   => $social_site . " " . __( "url:", 'drop' ),
                    'section' => 'ct_drop_social_settings',
                    'type'    => 'text',
                    'priority'=> $priority
                )
		    )
        );
		$priority = $priority + 5;
	}
}