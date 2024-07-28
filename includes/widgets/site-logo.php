<?php
class Elementor_website_logo extends \Elementor\Widget_Base {

    public function get_name() {
        return 'website_logo';
    }
    public function get_title() {
        return esc_html__( 'Websit Logo', 'tri' );
    }
    public function get_icon() {
        return 'eicon-product-categories';
    }
    public function get_categories() {
        return [ 'basic' ];
    }
    public function get_keywords() {
        return [ 'website','websit logo' ];
    }
    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'tri' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'website_logo_link',
			[
				'label' => esc_html__( 'Link', 'tri' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => get_site_url(),
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
       
        $this->end_controls_section();

        // This section for style tab
        $this->start_controls_section(
			'style_content',
			[
				'label' => esc_html__( 'Style', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'width',
			[
				'label' => esc_html__( 'Width', 'tri' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 80,
				],
				'selectors' => [
					'{{WRAPPER}} .tri_website_logo' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_responsive_control(
			'tri_website_logo-alignment',
			[
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .tri_website_logo_wrap' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
    }

    protected function render() {

        // Includes Style function
        $this->render_inline_styles(); 
        $settings = $this->get_settings_for_display();
        $website_logo_link= $settings['website_logo_link']['url'];
          ?>

        <div class='tri_website_logo__container'>
            <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            
            ?>
            <a class="tri_website_logo_wrap" href="<?php echo $website_logo_link; ?>">
                <img style="display:inline-block;;" class="tri_website_logo" src="<?php echo $image[0]; ?>" alt="">
            </a>
            
        </div>
    <?php
    }
    protected function render_inline_styles(){ ?>
         <style>
            a.tri_website_logo_wrap {
                display: inline-block;
                width: 100%;
            }
           
        </style>
        <?php
    }
}