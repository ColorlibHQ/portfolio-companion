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
 * Portfolio elementor skills section widget.
 *
 * @since 1.0
 */
class Portfolio_Skills extends Widget_Base {

	public function get_name() {
		return 'portfolio-skills';
	}

	public function get_title() {
		return __( 'My Skills', 'portfolio-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'portfolio-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  skills content ------------------------------
		$this->start_controls_section(
			'skills_content',
			[
				'label' => __( 'Skills content', 'portfolio-companion' ),
			]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'portfolio-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'I’m a Creative director based on New York, who loves clean, simple & unique design. I also enjoy crafting', 'portfolio-companion' ),
            ]
        );
        $this->add_control(
            'about_yourself',
            [
                'label' => esc_html__( 'About Yourself', 'portfolio-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Proin laoreet elementum ligula, ac tincidunt lorem accumsan nec. Fusce eget urna ante. Donec massa velit, varius a accumsan ac, tempor iaculis massa. Sed placerat justo sed libero varius vulputate. Ut a mi tempus massa malesuada fermentum. <br><br> Sed eleifend sed nibh nec fringilla. Donec eu cursus sem, vitae tristique ante. Cras pretium rutrum egestas. Integer ultrices libero sed justo vehicula, eget',
            ]
        );

        $this->add_control(
            'btn_title',
            [
                'label' => esc_html__( 'Section Title', 'portfolio-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Download CV', 'portfolio-companion' ),
            ]
        );

        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'portfolio-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'skills_sec_separator',
            [
                'label' => esc_html__( 'Personal Image Section', 'portfolio-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
		$this->add_control(
            'skills', [
                'label' => __( 'Create New', 'portfolio-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_title',
                        'label' => __( 'Skill Title', 'portfolio-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default'     => __( 'Wireframing', 'portfolio-companion' ),
                    ],
                    [
                        'name' => 'skill_val',
                        'label' => __( 'Skill Value', 'portfolio-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::NUMBER,
                        'min' => 1,
                        'max' => 100,
                        'default' => 90,
                    ],
                ],
                'default'   => [
                    [ 
                        'item_title'    => __( 'Weightlifting', 'portfolio-companion' ),
                        'skill_val'   => __( '90', 'portfolio-companion' ),
                    ],
                    [ 
                        'item_title'    => __( 'UI/UX', 'portfolio-companion' ),
                        'skill_val'   => __( '70', 'portfolio-companion' ),
                    ],
                    [ 
                        'item_title'    => __( 'Interaction design', 'portfolio-companion' ),
                        'skill_val'   => __( '45', 'portfolio-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End features content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_features_section', [
                'label' => __( 'Style Features Section', 'portfolio-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Section Title Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area .section_title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'single_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'portfolio-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'item_title_color', [
                'label' => __( 'Title Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area .single_feature h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_text_color', [
                'label' => __( 'Text Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area .single_feature p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'section_bg_style_seperator',
            [
                'label' => esc_html__( 'BG Styles', 'portfolio-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sec_bg_color', [
                'label' => __( 'Bg Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features_area' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $about_yourself = !empty( $settings['about_yourself'] ) ? $settings['about_yourself'] : '';
    $btn_title  = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : '';
    $btn_url  = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    $skills  = !empty( $settings['skills'] ) ? $settings['skills'] : '';
    ?>

    <div class="download_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-10">
                    <div class="download_text">
                        <?php 
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="download_left">
                        <?php 
                            if ( $about_yourself ) { 
                                echo '<p>'.wp_kses_post( nl2br($about_yourself) ).'</p>';
                            }
                            if ( $btn_title ) { 
                                echo '<a href="'.esc_url( $btn_url ).'" class="boxed-btn3-line">'.esc_html( $btn_title ).'</a>';
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="progress_skills">
                        <?php
                        if( is_array( $skills ) && count( $skills ) > 0 ) {
                            foreach( $skills as $item ) {
                                $item_title = ( !empty( $item['item_title'] ) ) ? $item['item_title'] : '';
                                $skill_val = ( !empty( $item['skill_val'] ) ) ? $item['skill_val'] : '';
                                ?>
                                <div class="single_progress">
                                    <div class="label d-flex justify-content-between">
                                        <?php 
                                            if ( $item_title ) { 
                                                echo '<span>'.esc_html( $item_title ).'</span>';
                                            }
                                            if ( $skill_val ) { 
                                                echo '<span>'.esc_html( $skill_val ).'%</span>';
                                            }
                                        ?>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?=esc_attr($skill_val)?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
}