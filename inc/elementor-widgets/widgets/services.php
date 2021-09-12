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
 * Portfolio services Contents section widget.
 *
 * @since 1.0
 */
class Portfolio_Services extends Widget_Base {

	public function get_name() {
		return 'portfolio-services';
	}

	public function get_title() {
		return __( 'Services', 'portfolio-companion' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

	public function get_categories() {
		return [ 'portfolio-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  services contents  ------------------------------
		$this->start_controls_section(
			'services_content',
			[
				'label' => __( 'Services Contents', 'portfolio-companion' ),
			]
        );
        $this->add_control(
            'big_text',
            [
                'label'         => __( 'Big Text', 'portfolio-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Services', 'portfolio-companion' )
            ]
        );
		$this->add_control(
            'services', [
                'label' => __( 'Create New', 'portfolio-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_icon',
                        'label' => __( 'Select Icon', 'portfolio-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SELECT,
                        'options' => portfolio_themify_icon(),
                        'default' => '3d-icon',
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Title', 'portfolio-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '3D Modeling', 'portfolio-companion' ),
                    ],
                    [
                        'name' => 'text',
                        'label' => __( 'Text', 'portfolio-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'A wonderful serenity has taken to the  <br> possession of my entire soul network <br> infrastructure, including consolidation of <br> established network designed and',
                    ],
                ],
                'default'   => [
                    [
                        'item_icon'        => '3d-icon',
                        'item_title'        => __( '3D Modeling', 'portfolio-companion' ),
                        'text' => 'A wonderful serenity has taken to the  <br> possession of my entire soul network <br> infrastructure, including consolidation of <br> established network designed and',
                    ],
                    [
                        'item_icon'        => 'layers-icon',
                        'item_title'        => __( 'UI/UX Design', 'portfolio-companion' ),
                        'text' => 'A wonderful serenity has taken to the  <br> possession of my entire soul network <br> infrastructure, including consolidation of <br> established network designed and',
                    ],
                    [
                        'item_icon'        => 'design-icon',
                        'item_title'        => __( 'Architectural Design', 'portfolio-companion' ),
                        'text' => 'A wonderful serenity has taken to the  <br> possession of my entire soul network <br> infrastructure, including consolidation of <br> established network designed and',
                    ],
                ]
            ]
        );
        $this->end_controls_section(); // End Hero content

        /**
         * Style Tab
         * ------------------------------ Style Title ------------------------------
         *
         */
        $this->start_controls_section(
            'style_team_member', [
                'label' => __( 'Style Member Section', 'portfolio-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Section Title Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title p' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .team_area .single_team .team_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_text_color', [
                'label' => __( 'Text Color', 'portfolio-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team .team_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings = $this->get_settings();
    $big_text = !empty( $settings['big_text'] ) ? $settings['big_text'] : '';
    $services = !empty( $settings['services'] ) ? $settings['services'] : '';
    ?>

    <!-- service_area  -->
    <div class="service_area">
        <?php
        if ( $big_text ) {
            echo '
            <div class="outline_text white d-none d-lg-block">
                '.esc_html( $big_text ).'
            </div>
            ';
        }
        ?>
        <div class="container">
            <div class="row">
                <?php
                if( is_array( $services ) && count( $services ) > 0 ){
                    foreach ( $services as $item ) {
                        $item_icon = !empty( $item['item_icon'] ) ? PORTFOLIO_DIR_ICON_IMG_URI . $item['item_icon'] . '.svg' : '';
                        $item_title = !empty( $item['item_title'] ) ? $item['item_title'] : '';
                        $text = !empty( $item['text'] ) ? $item['text'] : '';
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single_service">
                                <?php
                                    if ( $item_icon ) {
                                        echo '
                                        <div class="icon">
                                            <img src="'.esc_url( $item_icon ).'" alt="'.esc_attr( $item_title ).'">
                                        </div>
                                        ';
                                    }
                                    if ( $item_title ) {
                                        echo '<h3>'.esc_html( $item_title ).'</h3>';
                                    }
                                    if ( $text ) {
                                        echo '<p>'.wp_kses_post( nl2br($text) ).'</p>';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    }
}