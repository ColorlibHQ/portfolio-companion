<?php
namespace Portfolioelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Portfolio elementor testimonial section widget.
 *
 * @since 1.0
 */
class Portfolio_Testimonial extends Widget_Base {

	public function get_name() {
		return 'portfolio-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'portfolio-companion' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'portfolio-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Testimonial content ------------------------------
		$this->start_controls_section(
			'testimonial_content',
			[
				'label' => __( 'Testimonial content', 'portfolio-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => __( 'Section Title', 'portfolio-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'What Clients say', 'portfolio-companion' )
            ]
        );
		$this->add_control(
            'testimonials', [
                'label' => __( 'Create New', 'portfolio-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name' => 'client_img',
                        'label' => __( 'Client Image', 'portfolio-companion' ),
                        'description' => __( 'The Image size should be 68x68', 'portfolio-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'review_text',
                        'label' => __( 'Review Text', 'portfolio-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default'     => __( '“There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour or randomised words which don’t look even slightly believable. If you are going to use a passage.', 'portfolio-companion' ),
                    ],
                    [
                        'name' => 'client_name',
                        'label' => __( 'Client Name', 'portfolio-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Hasan Fardous', 'portfolio-companion' ),
                    ],
                    [
                        'name' => 'client_designation',
                        'label' => __( 'Client Designation', 'portfolio-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Business Owner', 'portfolio-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'client_img'    => [
                            'url'       => Utils::get_placeholder_image_src(),
                        ],
                        'review_text'   => __( '“There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour or randomised words which don’t look even slightly believable. If you are going to use a passage.', 'portfolio-companion' ),
                        'client_name'   => __( 'Hasan Fardous', 'portfolio-companion' ),
                        'client_designation' => __( 'Business Owner', 'portfolio-companion' ),
                    ],
                    [      
                        'client_img'    => [
                            'url'       => Utils::get_placeholder_image_src(),
                        ],
                        'review_text'   => __( '“There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour or randomised words which don’t look even slightly believable. If you are going to use a passage.', 'portfolio-companion' ),
                        'client_name'   => __( 'Kalvin Piterson', 'portfolio-companion' ),
                        'client_designation' => __( 'Business Owner', 'portfolio-companion' ),
                    ],
                    [      
                        'client_img'    => [
                            'url'       => Utils::get_placeholder_image_src(),
                        ],
                        'review_text'   => __( '“There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour or randomised words which don’t look even slightly believable. If you are going to use a passage.', 'portfolio-companion' ),
                        'client_name'   => __( 'Shakil Ahmed', 'portfolio-companion' ),
                        'client_designation' => __( 'Business Owner', 'portfolio-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End gallery content

    /**
     * Style Tab
     * ------------------------------ Style Section ------------------------------
     *
     */

        $this->start_controls_section(
            'style_gallery_section', [
                'label' => __( 'Style Gallery Section', 'portfolio-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'hover_overlay_col', [
                'label' => __( 'Hover overy Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area .single_gallery .hover_pop:before' => 'background: {{VALUE}};',
                ],
            ]
        );


        $this->add_control(
            'btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'portfolio-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'btn_bg_col', [
                'label' => __( 'Button BG Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area .view_pore.boxed-btn3' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hov_col', [
                'label' => __( 'Button Hover Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery_area .view_pore.boxed-btn3:hover' => 'background: transparent; color: {{VALUE}} !important; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    // call load widget script
    $this->load_widget_script(); 
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $testimonials = !empty( $settings['testimonials'] ) ? $settings['testimonials'] : '';
    ?>
    
    <!-- testimonial_area  -->
    <div class="testimonial_area ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title">
                        <?php
                            if ( $sec_title ) {
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <?php
                        if( is_array( $testimonials ) && count( $testimonials ) > 0 ){
                            foreach ( $testimonials as $item ) {
                                $client_img = !empty( $item['client_img']['id'] ) ? wp_get_attachment_image( $item['client_img']['id'], 'portfolio_client_thumb_68x68', '', array('alt' => portfolio_image_alt( $item['client_img']['url'] ) ) ) : '';
                                $review_text = !empty( $item['review_text'] ) ? $item['review_text'] : '';
                                $client_name = !empty( $item['client_name'] ) ? $item['client_name'] : '';
                                $client_designation = !empty( $item['client_designation'] ) ? $item['client_designation'] : '';
                                ?>
                                <div class="single_carousel">
                                    <div class="row">
                                        <div class="col-xl-9 col-md-9">
                                            <div class="single_testmonial">
                                                <?php
                                                    if ( $review_text ) {
                                                        echo '<p>'.wp_kses_post( $review_text ).'</p>';
                                                    }
                                                ?>
                                                <div class="testmonial_author">
                                                    <div class="thumb">
                                                        <?php
                                                            if ( $client_img ) {
                                                                echo $client_img;
                                                            }
                                                        ?>
                                                    </div>
                                                    <div class="author_name">
                                                        <?php
                                                            if ( $client_name ) {
                                                                echo '<h3>'.esc_html( $client_name ).'</h3>';
                                                            }
                                                            if ( $client_designation ) {
                                                                echo '<span>'.esc_html( $client_designation ).'</span>';
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // testmonial_active
            $('.testmonial_active').owlCarousel({
            loop:true,
            margin:0,
            items:1,
            autoplay:true,
            navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
            nav:true,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            responsive:{
                0:{
                    items:1,
                    dots:false,
                    nav:false,
                },
                767:{
                    items:1,
                    dots:false,
                    nav:false,
                },
                992:{
                    items:1,
                    nav:false
                },
                1200:{
                    items:1,
                    nav:false
                },
                1500:{
                    items:1
                }
            }
            });          
        })(jQuery);
        </script>
        <?php 
        }
    }	
}